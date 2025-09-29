@extends('layouts.app')

@section('title', $metaTitle)
@section('metaDescription', $metaDescription)
@section('pageType', 'home')

@section('content')
<h1>{{ $title }}</h1>
<p>{{ $subtitle }}</p>
<el-divider></el-divider>
<div class="grid sm:grid-cols-2 md:grid-cols-4 gap-x-4">
@foreach ($menu as $item)
  <div class="mb-6">
    <a href="{{ $item->url }}">{{ $item->title }}</a>
  </div>
  @endforeach
</div>
<el-divider></el-divider>
<div class="info-text">
  {!! $content !!}
</div>
<el-divider></el-divider>
<div>
  <h3>Latest articles</h3>
  <div class="grid lg:grid-cols-3 gap-6 mb-6">
  @foreach ($articles as $item)
    <div>
      @include('includes.article.imgLinked', ['item' => $item, 'height' => 50])
      <h4>
          <a href="/article/{{ $item->slug }}">{{$item->title}}</a>
      </h4>
      <div>{{substr(strip_tags($item->content), 0, 220) . '...'}}</div>
    </div>
  @endforeach
  </div>
</div>
@stop