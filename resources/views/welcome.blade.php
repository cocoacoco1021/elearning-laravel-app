<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/materia/bootstrap.min.css" rel="stylesheet" integrity="sha384-1tymk6x9Y5K+OF0tlmG2fDRcn67QGzBkiM3IgtJ3VrtGrIi5ryhHjKjeeS60f1FA" crossorigin="anonymous"> 

        <!-- Styles -->
        <style>

            nav{
                background: url("image/orange.jpg") no-repeat;
                background-size: cover;
            }

            .content {
                background: url("image/orange.jpg") no-repeat fixed left top;
                background-size: cover;
                text-align: center;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0; 
            }

            .content h1{
                font-size: 70px;
                padding-top: 200px;
                color: #fff;
            }

            .content h2{
                font-size: 20px;
                padding-top: 100px;
                color: #fff;
                margin-left: 200px;
                margin-right: 200px;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px; */
            } 
        </style>
    </head>
    <body>
        <div>
            <nav class="navbar">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        fels 
                    </a>      
                    <ul class="nav">
                        @if (Route::has('login'))
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                    </li>

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                        </li>
                                    @endif
                                @endauth
                        @endif
                    </ul>
                </div>
            </nav>     
            <div class="content">
                <h1> Fels E-learning </h1>
                <h2>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite.</h2>
            </div>
        </div>
    </body>
</html>
