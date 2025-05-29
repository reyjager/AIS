<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lantaw</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="grid-container">
        <!--  w:300px h:80px)  -->
       
        <!--  w: 300px h: auto 100%  -->
        <aside class="sidebar-area">
             <div class="brand-area ">
                @include('components.logo')
            </div>

            <div class="sidbar">
                @include('layouts.sidebar')
            </div>
                
        </aside>

        <!-- Main Content -->
        <main class="main-content-area">
            <div class="header-area">
                @include('layouts.header')
            </div>
            <div class="main-content">
                @include('layouts.content')
            </div>
        </main>

        <footer class="footer-area" >
            <p>footer content</p>
        </footer>

       
    </div>

</body>

</html>
