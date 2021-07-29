@extends('layouts.app_frontend')
@section('content')
    <h1>Trang chu frontend</h1>
    {{Auth::check()?"112233":"a"}}
@endsection
