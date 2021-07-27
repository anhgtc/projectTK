@extends('layouts.app_backend')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-blue-400">
    <!-- User detail-->
    <div class="bg-white p-16 rounded shadow-2xl w-2/3">
        <h2 class="text-3xl font-bold mb-10 text-gray-800">User detail</h2>
        @foreach ($user as $row)
        <form class="space-y-5" method="post" action="{{route('backend_user.update',$row->id)}}">
            @csrf
            <div>
                <label class="block mb-1 font-bold text-gray-500">Name</label>
                <input id="name" name="name" type="text" class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500" value="{{$row->name}}">
            </div>
            <div>
                <label class="block mb-1 font-bold text-gray-500">Email</label>
                <p id="email" name="email" type="email" class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500">{{$row->email}}</p>
            </div>
            <div>
                <label class="block mb-1 font-bold text-gray-500">Username</label>
                <p id="username" name="username" type="text" class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500">{{$row->username}}</p>
            </div>
            <div>
                <label class="block mb-1 font-bold text-gray-500">Password</label>
                <input id="password" name="password" type="text" class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500" value="{{$row->password}}">
            </div>
            <button type="submit" class="block w-full bg-yellow-400 hover:bg-yellow-300 p-4 rounded text-yellow-900 hover:text-yellow-800 transition duration-300">Save</button>
        </form>

        @endforeach
    </div>
</div>
@endsection
