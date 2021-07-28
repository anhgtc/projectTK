<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Frontend</title>
</head>
<body>
    <div class="bg-grey-lighter min-h-screen flex flex-col">
        <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
            <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                <h1 class="mb-8 text-3xl text-center">Sign up</h1>
                <form method="post" action="{{route('user.cfregister')}}">
                    @csrf
                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="name" placeholder="Name" />
                    <input type="email" class="block border border-grey-light w-full p-3 rounded mb-4" name="email" placeholder="Email" />
                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="username" placeholder="Username" />
                    <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4" name="password" placeholder="Password" />
                    <button type="submit" class="w-full text-center py-3 rounded bg-green-400 text-white hover:bg-green-dark focus:outline-none my-1">Create Account</button>
                </form>
            </div>
            <div class="text-grey-dark mt-6">
                Already have an account?
                <a class="no-underline border-b border-blue-500  text-blue-500" href="{{route('user.login')}}">
                Log in
                </a>.
            </div>
        </div>
    </div>
</body>

