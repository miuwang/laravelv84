<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>jQuery, popper.js, and Bootstrap</title>

    {{--    Load compiled CSS    --}}
    <link rel="stylesheet" href={{ asset('css/app.css') }}>

    {{--  popper.js CSS example  --}}
    <style>
        #tooltip {
            background: #333;
            color: white;
            font-weight: bold;
            padding: 4px 8px;
            font-size: 13px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

{{--  Test Bootstrap css  --}}
<div class="alert alert-success mt-5" role="alert">
    Boostrap 5 is working using laravel 8 mix!
</div>

{{--  popper.js HTML example  --}}
<button id="button" aria-describedby="tooltip">My button</button>
<div id="tooltip" role="tooltip">My tooltip</div>

{{--    Load compiled Javascript    --}}
<script src="{{ asset('js/app.js') }}"></script>
<script>
    //Test jQuery
    $(document).ready(function () {
        console.log('jQuery works!');

        //Test bootstrap Javascript
        console.log(bootstrap.Tooltip.VERSION);
    });

    //Test popper.js
    const button = document.querySelector('#button');
    const tooltip = document.querySelector('#tooltip');
    const popperInstance = Popper.createPopper(button, tooltip);
</script>

</body>
</html>
