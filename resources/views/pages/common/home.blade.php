@extends('layouts.app')

@section('title', $metaTitle)
@section('metaDescription', $metaDescription)

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
@stop