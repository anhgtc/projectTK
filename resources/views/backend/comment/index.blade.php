@extends('layouts.app_backend')
@section('content')
<!-- component -->
<div class="overflow-x-auto">
    <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
        <div class="w-full lg:w-5/6">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto text-center">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                            <th class="py-3 px-6 text-center">ID</th>
                            <th class="py-3 px-6 text-center">ID_USER</th>
                            <th class="py-3 px-6 text-center">CONTENT</th>
                            <th class="py-3 px-6 text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($comments as $comment)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center">
                                    <span class="font-medium">{{$comment->id}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center">
                                    <span>{{$comment->id_user}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center">
                                    <span>{{$comment->content}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <a href="{{route('backend_comment.destroy',$comment->id)}}">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                {{$comments->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
