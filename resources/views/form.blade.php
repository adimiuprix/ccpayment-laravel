<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <form action="/create-order" method="post">
            <button>submit</button>
        </form>
    </body>
</html>
