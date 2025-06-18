@extends('layouts.app')

@section('canonical', $canonical)
@section('title', $metaTitle)
@section('metaDescription', $metaDescription)
@section('pageType', 'withoutExample')

@section('content')
<div class="lg:flex gap-x-4">
    <div class="lg:w-3/4">
        <div class="info-text">
            <h1>{{ $title }}</h1>
            @if ($subtitle)
            <p>{{ $subtitle }}</p>
            @endif
            @if ($viewTag)
            <{{ $viewTag }}></{{ $viewTag }}>
            @endif
            <div>
            {!! $content !!}
            </div>
        </div>
    </div>
    @include('includes.similarTools', ['similar' => $similar])
</div>
@stop