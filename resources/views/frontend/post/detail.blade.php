@extends('layouts.app_frontend')
@section('content')
<div class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container w-full md:max-w-3xl mx-auto pt-20">
        <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
            <!--Title-->
            <div class="font-sans">
                <p class="text-base md:text-sm text-green-500 font-bold">&lt; <a href="{{route('post.index')}}" class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">BACK TO BLOG</a></p>
                <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">Welcome to Minimal Blog</h1>
                <p class="text-sm md:text-base font-normal text-gray-600">Published 19 February 2019</p>
            </div>
            <!--Post Content-->
            <!--Lead Para-->
            <p class="py-6">
                👋 Welcome fellow <a class="text-green-500 no-underline hover:underline" href="https://www.tailwindcss.com">Tailwind CSS</a> and miminal monochrome blog fan. This starter template provides a starting point to create your own minimal monochrome blog using Tailwind CSS and vanilla Javascript.
            </p>
            <p class="py-6">The basic blog page layout is available and all using the default Tailwind CSS classes (although there are a few hardcoded style tags). If you are going to use this in your project, you will want to convert the classes into components.</p>
            <h1 class="py-2 font-sans">Heading 1</h1>
            <h2 class="py-2 font-sans">Heading 2</h2>
            <h3 class="py-2 font-sans">Heading 3</h3>
            <h4 class="py-2 font-sans">Heading 4</h4>
            <h5 class="py-2 font-sans">Heading 5</h5>
            <h6 class="py-2 font-sans">Heading 6</h6>
            <p class="py-6">Sed dignissim lectus ut tincidunt vulputate. Fusce tincidunt lacus purus, in mattis tortor sollicitudin pretium. Phasellus at diam posuere, scelerisque nisl sit amet, tincidunt urna. Cras nisi diam, pulvinar ut molestie eget, eleifend ac magna. Sed at lorem condimentum, dignissim lorem eu, blandit massa. Phasellus eleifend turpis vel erat bibendum scelerisque. Maecenas id risus dictum, rhoncus odio vitae, maximus purus. Etiam efficitur dolor in dolor molestie ornare. Aenean pulvinar diam nec neque tincidunt, vitae molestie quam fermentum. Donec ac pretium diam. Suspendisse sed odio risus. Nunc nec luctus nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis nec nulla eget sem dictum elementum.</p>
            <ol>
                <li class="py-3">Maecenas accumsan lacus sit amet elementum porta. Aliquam eu libero lectus. Fusce vehicula dictum mi. In non dolor at sem ullamcorper venenatis ut sed dui. Ut ut est quam. Suspendisse quam quam, commodo sit amet placerat in, interdum a ipsum. Morbi sit amet tellus scelerisque tortor semper posuere.</li>
                <li class="py-3">Morbi varius posuere blandit. Praesent gravida bibendum neque eget commodo. Duis auctor ornare mauris, eu accumsan odio viverra in. Proin sagittis maximus pharetra. Nullam lorem mauris, faucibus ut odio tempus, ultrices aliquet ex. Nam id quam eget ipsum luctus hendrerit. Ut eros magna, eleifend ac ornare vulputate, pretium nec felis.</li>
                <li class="py-3">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc vitae pretium elit. Cras leo mauris, tristique in risus ac, tristique rutrum velit. Mauris accumsan tempor felis vitae gravida. Cras egestas convallis malesuada. Etiam ac ante id tortor vulputate pretium. Maecenas vel sapien suscipit, elementum odio et, consequat tellus.</li>
            </ol>
        </div>
        <!--Divider-->
        <hr class="border-b-2 border-gray-400 mb-8 mx-4">
        <!--Subscribe-->
        <div class="container px-4">
            <div class="font-sans bg-gray-500 rounded-lg shadow-xl p-4 text-center flex flex-col">
                <h3 class="font-bold break-normal text-xl md:text-3xl">Comments</h3>
                <div class="w-full text-center pt-4">
                    <form action="#">
                        <div class="max-w-xl mx-auto p-1 pr-0 flex flex-wrap items-center">
                            <input type="text"  class="flex-1 mt-4 appearance-none border border-gray-400 rounded shadow-md p-3 text-gray-600 mr-2 focus:outline-none">
                        </div>
                    </form>
                </div>
                <div class="mt-10 bg-white border border-gray-400 rounded">
                    {{-- @foreach ($comments as $comment) --}}
                    <div class="flex flex-col text-left  ">
                        <p class="font-bold">
                            {{-- {{$comment->username}} --}}anhgtc
                        </p>
                           <p class="mt-4">
                            {{-- {{$comment->content}} --}}hay we
                        </p>
                    </div>
                    {{--@endforeach--}}
                </div>
                <div class="bg-white mt-10 border border-gray-400 rounded">
                        <div class="flex flex-col text-left ">
                            <p class="font-bold">
                                anhgtc
                            </p>
                            <p class="mt-4">
                                hay we
                            </p>
                        </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
