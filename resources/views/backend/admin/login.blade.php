@extends('layouts.app_backend')
@section('content')
<form method="POST" action="/admin/login">
@csrf
<div class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
    <div class="block text-grey-darker text-3xl truncate font-bold mb-2 text-center">ADMIN</div>
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
        Username
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="username" id="username" type="text" placeholder="Username">
    </div>
    <div class="mb-6">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" name="password"id="password" type="password" placeholder="******************">
      <p class="text-red text-xs italic">Please choose a password.</p>
    </div>
      <input class="bg-blue hover:bg-blue-dark text-black font-bold py-2 px-4 rounded" type="submit" value="Dăng nhập"/>
</div>
</div>
</form>
@endsection

