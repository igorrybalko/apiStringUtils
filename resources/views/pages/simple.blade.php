@extends('layouts.app')

@section('canonical', $canonical)
@section('title', $metaTitle)
@section('metaDescription', $metaDescription)

@section('content')

<div class="info-text">
    <h1>{{ $title }}</h1>
    @if ($subtitle)
    <p>{{ $subtitle }}</p>
    @endif
    <div>
    {!! $content !!}
    </div>
</div>
@stop