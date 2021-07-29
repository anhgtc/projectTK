@extends('layouts.app_frontend')
@section('content')
    <div class="overflow-x-hidden bg-gray-100">
        <div class="px-6 py-8">
            <div class="container flex justify-between mx-auto">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Post</h1>
                    </div>
                    <div class="mt-6">
                        @foreach ($posts as $post)
                        <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                            <div class="mt-2">
                                <a href="{{route('post.show',$post->id)}}" class="text-2xl font-bold text-gray-700 hover:underline">{{$post->name}}</a>
                                <p class="mt-2 text-gray-600">
                                    {{$post->content}}
                                </p>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <a href="{{route('post.show',$post->id)}}" class="text-blue-500 hover:underline">Read more</a>
                            </div>
                        </div>
                        <br>
                        @endforeach
                    </div>
                    {{$posts->links()}}
                </div>
                <div class="hidden w-4/12 -mx-8 lg:block">
                    <div class="px-8 mt-6">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Categories</h1>
                        <div class="max-w-sm px-4 py-6 mx-auto bg-white rounded-lg shadow-md h-64 overscroll-y-auto overflow-auto">
                            <ul>
                                @foreach ($categories as $category)
                                <li class="mt-2">
                                    <a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">{{$category->name}}</a>
                                </li>

                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
