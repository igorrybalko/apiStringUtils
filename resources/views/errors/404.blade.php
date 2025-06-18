@extends('layouts.app')

@section('title', 'Page not found')
@section('pageType', '404')

@section('content')
<div class="lg:flex gap-x-4">
    <div class="lg:w-3/4">
        <h1>404</h1>
        <h2>Page not found</h2>
        <a href="/">To Home Page</a>
        <el-divider></el-divider>
        <app-bid></app-bid>
    </div>
    <div class="lg:w-1/4">
        <div>
            <a href='https://otieu.com/4/9405967' rel='nofollow noreferrer'>
                <img src='/img/partn.jpg' alt='' />
            </a>
        </div>
    </div>
</div>
@stop