@extends('layouts.app')

@section('canonical', $canonical)
@section('title', $metaTitle)
@section('metaDescription', $metaDescription)

@section('content')
<h1>{{ $title }}</h1>
<p>{{ $subtitle }}</p>
<div class="info-text">
{!! $content !!}
</div>
<div class="info-text">
    <h3>{{$json->title}}</h3>
    <div class="ant-row">
        <div class="ant-col ant-col-xs-24 ant-col-sm-24 ant-col-md-12">
            <div class="mb-24">
                <label>{{$json->input->label}}</label>
                <div class="p-textarea">
                    {!! $json->input->value !!}
                </div>
            </div>
        </div>
        <div class="ant-col ant-col-xs-24 ant-col-sm-24 ant-col-md-12">
            <div class="mb-24">
                <label>{{$json->output->label}}</label>
                <div class="p-textarea">
                    {!! $json->output->value !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop