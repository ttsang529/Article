<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Document</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link href="css/style.css" rel="stylesheet">
         @yield('css')
        <style>
        body {
            padding-top: 60px;
        }

        body,label,.checkbox label{
            font-weight:300;
        }
        
    </style>
    </head>
    <body>
        @include('partials.nav')
        <div class="container">
            @include ('flash::message')

            @yield('content')
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script>
            $('#flash-overlay-modal').modal();
           // $('div.alert').not('.alert-important').delay(3000).slideUp(300);
        </script>
        @yield('footer')
    </body>
</html>