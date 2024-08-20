@extends('layouts.app')

@section('canonical', '/case-converter')
@section('title', 'Case Converter Online Tools (Lowercase and Uppercase)')
@section('metaDescription', 'Online tool for convert string to uppercase, lowercase, capitalize words, sentence case. All caps to lowercase or uppercase.')

@section('content')
<h1>Case Converter Online</h1>
<div class="info-text">
  <h2>About Case Converter</h2>
  <p>Online tools for text case modification, allowing users to convert text to
    <strong>uppercase</strong>,
    <strong>lowercase</strong>, or
    <strong>capitalize</strong>words, are valuable for a variety of purposes. Writers and editors can utilize these tools to ensure consistent formatting and style in their documents. Content creators and social media managers may find them handy for crafting eye-catching headlines or captions. Additionally, programmers and developers can streamline their coding practices by easily adjusting the case of variables and identifiers. Overall, these online tools serve as versatile aids for anyone seeking efficient and uniform text transformation, enhancing readability and professionalism across different contexts.</p>
  <h3>Case converter examples</h3>
  <ul>
    <li>
      <strong>Lowercase:</strong>all caps to lowercase</li>
    <li>
      <strong>Uppercase:</strong>ALL CAPS TO UPPERCASE</li>
    <li>
      <strong>Capitalized case:</strong>Every First Letter In A Word Is Set To Uppercase</li>
    <li>
      <strong>Sentence case:</strong>Every first letter in a sentence is set to uppercase</li>
  </ul>
</div>
@stop