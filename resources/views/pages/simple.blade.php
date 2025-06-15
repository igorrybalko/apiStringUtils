@extends('layouts.app')

@section('canonical', $canonical)
@section('title', $metaTitle)
@section('metaDescription', $metaDescription)

@section('content')

<h1>{{ $title }}</h1>
    @if ($subtitle)
        <p>{{ $subtitle }}</p>
    @endif
    @if ($viewTag)
        <{{ $viewTag }}></{{ $viewTag }}>
    @endif
<div class="info-text">
    {!! $content !!}
</div>
@stop