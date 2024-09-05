<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- Ckeditor -->
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css" />
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-selection__choice {
            background-color: #007bff !important;
            color: white;
            border: none;
        }
        .select2-selection__choice__remove {
            color: white !important;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('partials.header')

        @include('partials.sidebar')

        @yield('content')

        @include('partials.footer')

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/7de63b23c2.js" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
            }
        }
    </script>

    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph
        } from 'ckeditor5';

        ClassicEditor
            .create(document.querySelector('#editor'), {
                plugins: [Essentials, Bold, Italic, Font, Paragraph],
                toolbar: {
                    items: [
                        'undo', 'redo', '|', 'bold', 'italic', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                    ]
                }
            })
            .then(editor => {
                console.log('Editor initialized:', editor);
                // Sync CKEditor content with textarea
                editor.model.document.on('change:data', () => {
                    document.querySelector('#editor').value = editor.getData();
                });
            })
            .catch(error => {
                console.error('Error initializing CKEditor:', error);
            });
    </script>
</body>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Chọn vai trò",
            allowClear: true
        });
    });
</script>

</html>
