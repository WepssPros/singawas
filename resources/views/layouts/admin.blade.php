<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Dashboard</title>
        @include('layouts.admin.css')
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">


            @include('layouts.admin.loader')


            @include('layouts.admin.navbar')




            @include('layouts.admin.sidebar')


            <div class="content-wrapper">

                @yield('admin-header')

                <!-- Main content -->
                @yield('admin-content')
                <!-- /.content -->
            </div>


            @include('layouts.admin.footer')


        </div>


        @include('layouts.admin.js')
        @include('sweetalert::alert')
    </body>

</html>