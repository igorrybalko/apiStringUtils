<?php 
$appHost = env('APP_HOST');
$mainJs = env('MAIN_JS');
$mainCss = env('MAIN_CSS');
?>

<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />

  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />

  <meta property="og:locale" content="en_US" />
  <meta property="og:site_name" content="StringUtils" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="@yield('title')" />
  <meta
   property="og:description"
   content="@yield('metaDescription')"
  />

  <meta
   property="og:image"
   content="https://stringutils.online/img/icon600x600.png"
  />
  <meta property="og:image:width" content="600" />
  <meta property="og:image:height" content="600" />

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="@yield('title')" />
  <meta
   name="twitter:description"
   content="@yield('metaDescription')"
  />
  <meta name="robots" content="index,follow" />
  <meta name="google-adsense-account" content="ca-pub-9489202619963673" />

  <meta
     name="description"
     content="@yield('metaDescription')"
    />

    <link rel="canonical" href="{{$appHost}}@yield('canonical')">
    
  <title>@yield('title')</title>
  <script type="application/ld+json">
   {
     "@context": "http://www.schema.org",
     "@type": "WebSite",
     "name": "StringUtils",
     "alternateName": "String Utils",
     "url": "https://stringutils.online"
   }
  </script>
    <!-- @php
        if(isset($_COOKIE['cookieAgree']) && $_COOKIE['cookieAgree'] == '1'){
            echo '<script async src="https://www.googletagmanager.com/gtag/js?id=G-4WXYJQBTY9"></script>';
        }
    @endphp -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4WXYJQBTY9"></script>
  <script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'G-4WXYJQBTY9');
  </script>

<!-- <script id="cookieyes" type="text/javascript" src="https://cdn-cookieyes.com/client_data/99afb49f8a29b1227c89b46f/script.js"></script> -->

   <!-- Bidvertiser2100164 -->

   @vite(['resources/sass/app.scss', 'resources/css/style.css', 'resources/ts/app.ts'])
        
 </head>
 <body>
  <div id="root">
    
        <div>
            <header>
                <div class="wrapper">
                    <div class="flex justify-between header-inner">
                        <a href="/">StringUtils</a>
                        @include('includes.topmenu')
                    </div>
                </div>
            </header>
            <main class="mb-6 pt-6">
                <div class="wrapper">
                    @yield('content')
                </div>
            </main>
            <app-share></app-share>
        </div>
        <footer class="py-4">
            <div class="wrapper">
                <div class="text-center text-xs mb-2">Convert your data as you want</div>
                <div class="flex justify-between">
                    <div>© 2025 StringUtils</div>
                    <div>
                        <nav class="mb-2">
                            <div>
                                <a href="/contacts">Contacts</a>
                            </div>
                            <div>
                                <a href="/privacy-policy">Privacy Policy</a>
                            </div>
                        </nav>
                        @include('includes.hitua')
                    </div>
                </div>
            </div>
        </footer>
    
  </div>

 </body>
</html>