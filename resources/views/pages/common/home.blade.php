@extends('layouts.app')

@section('title', $metaTitle)
@section('metaDescription', $metaDescription)

@section('content')
<h1>{{ $title }}</h1>
<div class="ant-row">
@foreach ($menu as $item)
  <div class="ant-col ant-col-xs-12 ant-col-sm-12 ant-col-md-6" style="padding-left: 12px; padding-right: 12px;">
    <div class="mb-30">
      <a href="{{ $item->url }}">{{ $item->title }}</a>
    </div>
  </div>
  @endforeach
</div>
<div class="info-text">
  {!! $content !!}
</div>
@stop