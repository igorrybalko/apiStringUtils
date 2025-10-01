@extends('layouts.app')

@section('canonical', $canonical)
@section('title', $metaTitle)
@section('metaDescription', $metaDescription)
@section('pageType', 'simple')

@section('content')
@include('includes.backToHome')
<div class="lg:flex gap-x-6">
    <div class="lg:w-3/4 mb-6">
        <h1>{{ $title }}</h1>
        @if ($subtitle)
            <p>{{ $subtitle }}</p>
        @endif
        @if ($viewTag)
        <div class="view-tag" data-id="{{ $viewTag }}">
            <{{ $viewTag }} class="view-tag"></{{ $viewTag }}>
        </div>
        @endif
        <div class="info-text">
            {!! $content !!}
        </div>
    </div>
    <div class="lg:w-1/4">
        <x-random-articles />
    </div>
</div>
@stop