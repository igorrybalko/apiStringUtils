@extends('layouts.app')

@section('canonical', $canonical)
@section('title', $metaTitle)
@section('metaDescription', $metaDescription)
@section('pageType', 'article')

@section('content')

<h1>{{ $title }}</h1>
@if ($subtitle)
    <p>{{ $subtitle }}</p>
@endif
<div class="info-text">
    {!! $content !!}
</div>
@stop