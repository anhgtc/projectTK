@extends('layouts.app_frontend')
@section('content')
<div class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container w-full md:max-w-3xl mx-auto pt-20">
        <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
            @foreach ($posts as $post)
            <div class="font-sans">
                <p class="text-base md:text-sm text-green-500 font-bold">&lt; <a href="{{route('post.index')}}" class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">BACK TO BLOG</a></p>
                <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">{{$post->name}}</h1>
                <p class="text-sm md:text-base font-normal text-gray-600">{{$post->updated_at}}</p>
            </div>
            <!--Post Content-->
            <p class="py-6">
                {{$post->content}}
            </p>
            @endforeach
        </div>
        <!--Divider-->
        <hr class="border-b-2 border-gray-400 mb-8 mx-4">
        <!--Comments-->
        <div class="container px-4">
            <div class="font-sans bg-gray-500 rounded-lg shadow-xl p-4 text-center flex flex-col">
                <h3 class="font-bold break-normal text-xl md:text-3xl">Comments</h3>
                @auth
                <div class="w-full text-center pt-4">
                    @foreach ($posts as $post)
                    <form action="{{route('comment.store',$post->id)}}" method="post">
                        @csrf
                        <div class="max-w-xl mx-auto p-1 pr-0 flex flex-wrap items-center">
                            <input type="text"  name="content" class="flex-1 mt-4 appearance-none border border-gray-400 rounded shadow-md p-3 text-gray-600 mr-2 focus:outline-none">
                            <input type="submit" name="add" class="border border-gray-400 rounded bg-blue-500" value="Add">
                        </div>
                    </form>
                    @endforeach
                </div>
                @else
                <a href="{{route('user.login')}}" class="flex-1 mt-4 bg-blue-500 appearance-none border border-gray-400 rounded shadow-md p-3 text-gray-600 mr-2 focus:outline-none">Login to comment</a>
                @endauth
                @foreach ($comments as $comment)
                <div class="mt-10 bg-white border border-gray-400 rounded">
                    <div class="flex flex-col text-left  ">
                        <p class="font-bold">
                            {{$comment->username}}
                        </p>
                           <p class="mt-4">
                            {{$comment->content}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection
