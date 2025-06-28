@extends('layouts.app')

@section('canonical', $canonical)
@section('title', $metaTitle)
@section('metaDescription', $metaDescription)
@section('pageType', 'article')
@section('img', '/img/articles/' . $img)

@section('content')
<ol class="text-sm mb-6 flex gap-1" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope
      itemtype="https://schema.org/ListItem">
        <a href="/" itemprop="item"><span itemprop="name">Home</span></a> <el-icon size="10"><d-arrow-right></d-arrow-right></el-icon>
        <meta itemprop="position" content="1" />
    </li>
    <li itemprop="itemListElement" itemscope
      itemtype="https://schema.org/ListItem">
        <a href="/article" itemprop="item"><span itemprop="name">Articles</span></a>
        <meta itemprop="position" content="2" />
    </li>
</ol>

<div class="mb-3 max-h-[250px]">
    <img class="object-cover object-center h-full w-full max-h-[250px]" 
    src="{{$img ? '/img/articles/' . $img : '/img/noimg.jpg'}}" alt="{{$img_alt}}" />
</div>

<h1>{{ $title }}</h1>
@if ($subtitle)
    <p>{{ $subtitle }}</p>
@endif
<div class="info-text">
    {!! $content !!}
</div>
@stop