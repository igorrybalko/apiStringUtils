@extends('layouts.app')

@section('canonical', '/article')
@section('title', 'List of articles - StringUtils')
@section('metaDescription', 'Blog of a service with online tools for formatting string data, generating a hash and other manipulations with text data')
@section('pageType', 'article-list')

@section('content')
@include('includes.backToHome')
<h1>List of articles</h1>

<div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6 mb-6">
    @foreach ($data['data'] as $item)
        <div>
            <div class="overflow-hidden h-50">
                <a href="/article/{{ $item->slug }}">
                    <img class="object-cover object-center hover:scale-105 duration-500 h-full w-full" 
                    src="{{$item->img ? '/img/articles/' . $item->img : '/img/noimg.jpg'}}" 
                    alt="{{$item->img_alt}}" />
                </a>
            </div>
            <h4>
                <a href="/article/{{ $item->slug }}">{{$item->title}}</a>
            </h4>
            <div>{{substr(strip_tags($item->content), 0, 220) . '...'}}</div>
        </div>
    @endforeach
</div>
<div class="flex items-center gap-8">
    @if ($data['current_page'] == 1)
        <button disabled class="rounded-md border border-slate-300 p-2.5 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
            @include('includes.icons.paginArrowLeft')
        </button>
    @else
        <a href="{{$data['prev_page_url']}}" class="rounded-md border border-slate-300 p-2.5 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800">
            @include('includes.icons.paginArrowLeft')
        </a>
    @endif

    <div class="text-slate-600">
        Page <strong class="text-slate-800">{{$data['current_page']}}</strong> of&nbsp;<strong class="text-slate-800">{{$data['last_page']}}</strong>
    </div>

    @if ($data['current_page'] == $data['last_page'])
        <button disabled class="rounded-md border border-slate-300 p-2.5 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
            @include('includes.icons.paginArrowRight')
        </button>
    @else
        <a href="{{$data['next_page_url']}}" class="rounded-md border border-slate-300 p-2.5 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800">
            @include('includes.icons.paginArrowRight')
        </a>
    @endif
</div>

    

@stop