@extends('layouts.app')

@section('canonical', $canonical)
@section('title', $metaTitle)
@section('metaDescription', $metaDescription)
@section('pageType', 'withExample')

@section('content')
<div class="lg:flex gap-x-4">
    <div class="lg:w-3/4">
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
        @include('includes.ewidget', ['json' => $json])
    </div>
    @include('includes.similarTools', ['similar' => $similar])
</div>

@stop