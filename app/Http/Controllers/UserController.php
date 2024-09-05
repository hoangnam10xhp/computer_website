<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'email' => [
                'required',
                'email',
                'unique:users,email',
                'regex:/^[a-zA-Z0-9._%+\\-]+@gmail.com$/'
            ],
            'password' => 'required|string|min:8',
        ], [
            'email.regex' => 'Email phải có đuôi là @gmail.com'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);


        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('admin.user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    { {
            $user = User::findOrFail($id);

            $request->validate([
                'name' => 'string|required',
                'email' => [
                    'required',
                    'email',
                    'unique:users,email,' . $user->id,
                    'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/'
                ],
                'password' => 'nullable|string|min:8|confirmed',
            ], [
                'email.regex' => 'Email phải có đuôi là @gmail.com'
            ]);

            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ];

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->input('password'));
            }

            $user->update($data);

            return redirect()->route('users.index');
        }
    }

    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('users.index');
    }
}
