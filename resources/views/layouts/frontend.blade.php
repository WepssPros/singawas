<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sistem Informasi Pengawasan Kendaraan</title>

        @include('layouts.frontend.css')
        @include('layouts.frontend.style-sim')
       
    </head>

    <body id="top">

        @include('layouts.frontend.header')

        <main>
            <article>
                @yield('frontend-content')
            </article>
        </main>


        @include('layouts.frontend.footer')



        <a href="#top" class="go-top" data-go-top>
            <ion-icon name="chevron-up-outline"></ion-icon>
        </a>


        @include('layouts.frontend.js')
        @include('sweetalert::alert')
    </body>

</html>