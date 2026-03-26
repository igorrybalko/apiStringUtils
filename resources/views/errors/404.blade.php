@extends('layouts.app')

@section('title', 'Page not found')
@section('pageType', '404')

@section('content')
<div class="lg:flex gap-x-6">
    <div class="lg:w-3/4">
        <h1>404</h1>
        <h2>Page not found</h2>
        <a href="/">To Home Page</a>
        <el-divider></el-divider>
    </div>
    <div class="lg:w-1/4">
        <x-random-articles :title="'Articles'" />
    </div>
</div>
@stop