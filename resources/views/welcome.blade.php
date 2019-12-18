<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Elnur</title>

        <!-- Fonts -->
{{--        <link href="css/bootstrap.min.css" rel="stylesheet">--}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }


            .bg-3 {
                background-color: #ffffff;
                color: #555555;
            }
            .container-fluid {
                padding-top: 70px;
                padding-bottom: 70px;
            }

            .active>a {
                color: #1abc9c !important;;
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

            .m-b-md {
                margin-bottom: 30px;
            }
            .nav ul {
                list-style: none;
                background-color: #444;
                text-align: center;
                padding: 0;
                margin: 0;
            }
            .nav li {
                font-family: 'Oswald', sans-serif;
                font-size: 1.2em;
                line-height: 40px;
                height: 40px;
                border-bottom: 1px solid #888;
            }

            .nav a {
                text-decoration: none;
                color: #fff;
                display: block;
                transition: .3s background-color;
            }

            .nav a:hover {
                background-color: #005f5f;
            }

            .nav a.active {
                background-color: #fff;
                color: #444;
                cursor: default;
            }

            @media screen and (min-width: 600px) {
                .nav li {
                    width: 120px;
                    border-bottom: none;
                    height: 50px;
                    line-height: 50px;
                    font-size: 1.4em;
                }

                /* Option 1 - Display Inline */
                .nav li {
                    display: inline-block;
                    margin-right: -4px;
                }

                /* Options 2 - Float
                .nav li {
                  float: left;
                }
                .nav ul {
                  overflow: auto;
                  width: 600px;
                  margin: 0 auto;
                }
                .nav {
                  background-color: #444;
                }
                */
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Technical assigment
                </div>
                <div class="nav">
                    <ul>
                        <li class="home"><a href="/">Home</a></li>
                        <li class="tutorials"><a class="active" href="/c">Tutorials</a></li>
                        <li class="about"><a href="#">About</a></li>
                        <li class="news"><a href="#">Newsletter</a></li>
                        <li class="contact"><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="links">
                    <ul>
                    <li><a href="/sv">Task 1</a></li>
                    <li><a href="https://laracasts.com">Task 2</a></li>
                        <li><a href="https://laravel-news.com">Task 3</a></li></ul>
                </div>
            </div>
        </div>
    </body>
</html>
