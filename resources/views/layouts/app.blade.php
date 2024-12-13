<?php 
$appHost = env('APP_HOST');
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
     data-react-helmet="true"
    />

    <link rel="canonical" href="{{$appHost}}@yield('canonical')" data-react-helmet="true">
    
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

   <script type="module" crossorigin src="/assets/index-CZaTtlyv.js"></script>
   <link rel="stylesheet" crossorigin href="/assets/index-YAnZjGKd.css">
 </head>
 <body>
  <div id="root">
    <div class="ant-layout">
        <div>
            <div class="ant-layout-header">
                <div class="wrapper">
                    <div class="d-flex header-inner">
                        <a href="/">StringUtils</a>
                        @include('includes.topmenu')
                    </div>
                </div>
            </div>
            <main class="ant-layout-content">
                <div class="wrapper">
                    @yield('content')
                </div>
            </main>
        </div>
        <footer class="ant-layout-footer">
            <div class="wrapper">
                <div class="text-center f-sm mb-10">Convert your data as you want</div>
                <div class="d-flex jc-sb">
                    <div>© 2024 StringUtils</div>
                    <div>
                        <a href="/privacy-policy">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
  </div>

 </body>
</html>