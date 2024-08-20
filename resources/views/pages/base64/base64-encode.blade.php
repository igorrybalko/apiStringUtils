@extends('layouts.app')

@section('canonical', '/base64-encode')
@section('title', 'Base64 Encode Online Tools - Free')
@section('metaDescription', 'Encode string to Base64 format online - free. Convert text to Base64')

@section('content')
<h1>Base64 Encode Online (Text)</h1>
<div class="info-text">
  <h2>Encode a string to Base64 online</h2>
  <p>Encoding is done using the
    <a href="https://developer.mozilla.org/en-US/docs/Web/API/btoa" target="_blank" rel="nofollow">btoa()</a> function</p>
  <p>Base64 is a standard for encoding binary data using only 64 ASCII characters. The encoding uses Latin characters A-Z, a-z, numbers 0-9 (62 characters in total) and 2 additional characters</p>
</div>
@stop