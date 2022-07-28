@extends('Admin::base')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('main')
    <p>This is my body content.</p>
@endsection

