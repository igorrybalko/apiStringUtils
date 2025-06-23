@extends('layouts.app')

@section('canonical', '/article')
@section('title', 'meta title list')
@section('metaDescription', 'meta desc')
@section('pageType', 'article-list')

@section('content')

<h1>List</h1>
<pre>
    <?php var_dump($data)?>
</pre>



@foreach ($data['data'] as $item)
<div class="info-text">
        <a href="/article/{{ $item->slug }}">{{$item->title}}</a>
        </div>
@endforeach
    

@stop