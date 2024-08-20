@extends('layouts.app')

@section('canonical', '/img-to-base64')
@section('title', 'Image to Base64 Converter Online | Base64 Image Encoder (Free)')
@section('metaDescription', 'Convert an image to Base64 online. Conver jpg, png, svg, webp to Base64')

@section('content')
<h1>Convert Image to Base64 Online</h1>
<div class="info-text">
  <h2>Encode your image to Base64 online</h2>
  <p>You can upload an image in next formats:
    <strong>jpg, png, svg, webp</strong>. Maximum image size
    <strong>9 MB</strong>.</p>
  <p>We don't save your images on our server.</p>
  <p>Once you have a Base64 string representation of an image, you can use it in various ways depending on your specific requirements and the environment you're working in:</p>
  <ul>
    <li>
      <strong>Embedding in HTML:</strong>You can directly embed the Base64 string into HTML using the img tag with the src attribute set to the Base64 string. This allows you to display the image on a webpage without needing a separate image file.</li>
    <li>
      <strong>Storing in Databases:</strong>If you're working with databases, you can store the Base64 string as a text. This allows you to efficiently store and retrieve image data without needing to handle separate image files.</li>
    <li>
      <strong>Sending via APIs:</strong>When working with APIs, you can include the Base64 string as part of the payload when sending data to a server. This enables you to transmit image data along with other information in a single request.</li>
  </ul>
</div>
@stop