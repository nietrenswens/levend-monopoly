<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Levend Monopoly - @yield('title')</title>
</head>
<body class="bg-blue-300">
    <nav>
        <div class="w-full bg-gray-800">
            <div class="md:w-4/5 w-11/12 mx-auto flex justify-between">
                <h2 class="text-white font-bold text-2xl py-4">
                    Levend Monopoly
                </h2>
                <div class="flex items-center justify-end space-x-4 text-white text-md">
                    <a href="#" class="">Home</a>
                    <a href="{{ route('login') }}" class="">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <div>
        <div class="w-5/6 mx-auto bg-white mt-10 py-6">
            <div class="w-11/12 mx-auto">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>