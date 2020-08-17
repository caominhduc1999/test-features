<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="{{mix('/css/app.css')}}">
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
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height" id="app">
            <div class="container">
                <div class="row">
                    <example-component></example-component>
                </div>
                <div class="row">
                    @foreach($images as $image)
                        <div class="col-2 mb-4">
                            <a href="{{$image->original}}">
                                <img src="{{$image->thumbnail}}" class="w-100" alt="">
                            </a>

                            <form action="/images/{{$image->id}}" method="post">
                                @method('DELETE')
                                @csrf

                                <button class="small btn btn-outline-danger mt-2">Delete</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <script src="{{mix('/js/app.js')}}"></script>
    </body>
</html>
