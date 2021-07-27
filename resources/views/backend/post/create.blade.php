@extends('layouts.app_backend')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-blue-400">
    <!-- User detail-->
    <div class="bg-white p-16 rounded shadow-2xl w-2/3">
        <h2 class="text-3xl font-bold mb-10 text-gray-800">Create new account</h2>
        <form class="space-y-5" method="post" action="{{route('backend_post.create')}}">
            @csrf
            <div>
                <label class="block mb-1 font-bold text-gray-500">Category</label>
                <select name="category" id="category">
                    @foreach ($categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1 font-bold text-gray-500">Name</label>
                <input id="name" name="name" type="text" class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500">
            </div>
            <div>
                <label class="block mb-1 font-bold text-gray-500">Content</label>
                <input id="content" name="content" type="text" class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500">
            </div>
            <button type="submit" class="block w-full bg-yellow-400 hover:bg-yellow-300 p-4 rounded text-yellow-900 hover:text-yellow-800 transition duration-300">Create</button>
        </form>
    </div>
</div>
@endsection
