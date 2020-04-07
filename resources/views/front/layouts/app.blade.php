@include('front.hi')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="{{ asset('favicon.ico') }}"/>

<!-- Auto Generate for SEO -->
{!! SEOMeta::generate() !!}
<meta name="msapplication-TileColor" content="#f7f7f7"/>
<meta name="theme-color" content="#f7f7f7"/>

<!-- Auto OpenGraph -->
{!! OpenGraph::generate() !!}
@if(Route::currentRouteName() === "blog.show")
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "@yield('uri')"
    },
    "headline": "@yield('headline')",
    "image": [
        "@yield('image')",
    ],  
    "author": {
        "@type": "Person",
        "name": "Riski"
    },  
    "publisher": {
        "@type": "Organization",
        "name": "Riski Web ID",
        "logo": {
            "@type": "ImageObject",
            "url": "https://riski.web.id/logo-sm.png",
            "width": 300,
            "height": 60
        }
    },
    "datePublished": "@yield('datePublished')",
    "dateModified": "@yield('dateModified')"
}
</script>
@endif
@if(Route::currentRouteName() === "index")
<script type="application/ld+json">
{
    "@context": "https://schema.org/",
    "@type": "WebSite",
    "name": "Riski Web ID",
    "url": "https://riski.web.id",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "https://riski.web.id/search?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>
@endif
@if(Route::currentRouteName() === 'about')
<script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Person",
        "name": "Riski Web ID",
        "url": "https://riski.web.id",
        "image": "picurl.jpg",
        "sameAs": [
            "https://facebook.com",
            "https://twitter.com",
            "https://instagram.com",
            "https://youtube.com/riskiwebid",
            "https://github.com",
            "https://riski.web.id"
        ]  
    }
    </script>
@endif
@if(Route::currentRouteName() === "Hanya untuk breadcrumb")
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Books",
            "item": "https://example.com/books"
        },{
            "@type": "ListItem",
            "position": 2,
            "name": "Authors",
            "item": "https://example.com/books/authors"
        },{
            "@type": "ListItem",
            "position": 3,
            "name": "Ann Leckie",
            "item": "https://example.com/books/authors/annleckie"
        }]
    }
</script>
@endif
{{-- Styles --}}
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('fonts/hk-grotesk/style.css') }}">
<link rel="stylesheet" href="{{ asset('fonts/material-icons/material-icons.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

@if(Route::currentRouteName() === "blog.index")
<body data-theme="light" data-page="blog-index">
@elseif(Route::currentRouteName() === "blog.show")
<body data-theme="light" data-page="blog-single">
@elseif(Route::currentRouteName() === "index")
<body data-theme="light" data-page="home">
@else
<body data-theme="light">
@endif

<div id="AnhOi" data-version="one" data-version-name="anhoi-mot">
    {{-- @include('front.components.preload') --}}
    @if( Route::currentRouteName() === "index")
        @include('front.layouts.hero')
    @endif
    <main id="main">
        @yield('content')
        @include('front.layouts.footer')
    </main>
</div>

@stack('script')
</body>
</html>