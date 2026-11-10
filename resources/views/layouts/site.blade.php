<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@php
    $locale = app()->getLocale();
    $otherLocale = $locale === 'lv' ? 'en' : 'lv';
    $routeKey = str(request()->route()->getName())->after('.')->toString();
    $alternateParameters = array_merge(request()->route()->parameters(), request()->only('category'));
@endphp
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#3372AD">
    <title>@yield('title') · VIKOMAKSS</title>
    <meta name="description" content="@yield('description', __('site.meta.description'))">
    <link rel="canonical" href="{{ url()->current() }}">
    @foreach (['lv', 'en'] as $alternate)
        <link rel="alternate" hreflang="{{ $alternate }}" href="{{ route($alternate.'.'.$routeKey, request()->route()->parameters()) }}">
    @endforeach
    <link rel="alternate" hreflang="x-default" href="{{ route('lv.'.$routeKey, request()->route()->parameters()) }}">
    <meta property="og:type" content="website"><meta property="og:locale" content="{{ $locale === 'lv' ? 'lv_LV' : 'en_GB' }}"><meta property="og:title" content="@yield('title') · VIKOMAKSS"><meta property="og:description" content="@yield('description', __('site.meta.description'))"><meta property="og:image" content="{{ asset('images/stock/architecture-hero.jpg') }}"><meta property="og:url" content="{{ url()->current() }}">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body id="top">
    <a class="skip-link" href="#main">{{ __('site.nav.skip') }}</a>
    <div class="utility-bar section-shell"><span>{{ __('site.common.since') }}<span class="utility-divider"></span>{{ __('site.common.location') }}</span><a href="mailto:{{ config('website.email') }}"><x-site-icon name="mail" />{{ config('website.email') }}</a></div>
    <header class="site-header section-shell" data-header>
        <a class="brand-link" href="{{ route($locale.'.home') }}" aria-label="Vikomakss — {{ __('site.nav.home') }}"><x-brand /></a>
        <nav class="desktop-nav" aria-label="{{ __('site.nav.label') }}">
            @foreach (['home', 'services', 'projects', 'about', 'contact'] as $page)
                <a class="{{ request()->routeIs($locale.'.'.$page, $locale.'.'.$page.'.*') ? 'is-active' : '' }}" href="{{ route($locale.'.'.$page) }}" @if(request()->routeIs($locale.'.'.$page, $locale.'.'.$page.'.*')) aria-current="page" @endif>{{ __('site.nav.'.$page) }}</a>
            @endforeach
        </nav>
        <div class="header-actions"><div class="language-switch" aria-label="{{ __('site.nav.language') }}"><span aria-current="true">{{ strtoupper($locale) }}</span><a href="{{ route($otherLocale.'.'.$routeKey, $alternateParameters) }}" lang="{{ $otherLocale }}" hreflang="{{ $otherLocale }}">{{ strtoupper($otherLocale) }}</a></div><a class="header-contact" href="{{ route($locale.'.contact') }}">{{ __('site.nav.cta') }}<x-site-icon name="arrow-up-right" /></a><button class="menu-toggle" type="button" data-menu-toggle aria-expanded="false" aria-controls="mobile-navigation" aria-label="{{ __('site.nav.open') }}" data-label-open="{{ __('site.nav.open') }}" data-label-close="{{ __('site.nav.close') }}"><x-site-icon name="menu" class="menu-open-icon" /><x-site-icon name="close" class="menu-close-icon" /></button></div>
        <nav id="mobile-navigation" class="mobile-nav" aria-label="{{ __('site.nav.label') }}" inert>
            @foreach (['home', 'services', 'projects', 'about', 'contact'] as $page)
                <a href="{{ route($locale.'.'.$page) }}" @if(request()->routeIs($locale.'.'.$page, $locale.'.'.$page.'.*')) aria-current="page" @endif><span>0{{ $loop->iteration }}</span>{{ __('site.nav.'.$page) }}<x-site-icon name="arrow-up-right" /></a>
            @endforeach
        </nav>
    </header>
    <main id="main">@yield('content')</main>
    @unless(request()->routeIs($locale.'.contact'))<x-callout />@endunless
    <footer class="site-footer"><div class="section-shell"><div class="footer-top"><div class="footer-brand"><a href="{{ route($locale.'.home') }}"><x-brand light /></a><p class="footer-tagline">{{ __('site.footer.tagline') }}</p><p>{{ __('site.footer.description') }}</p></div><div class="footer-links"><p class="overline">{{ __('site.footer.navigation') }}</p>@foreach (['home', 'services', 'projects', 'about', 'contact'] as $page)<a href="{{ route($locale.'.'.$page) }}">{{ __('site.nav.'.$page) }}</a>@endforeach</div><div class="footer-contact"><p class="overline">{{ __('site.footer.contact') }}</p><a href="tel:{{ config('website.phone_link') }}">{{ config('website.phone') }}</a><a href="mailto:{{ config('website.email') }}">{{ config('website.email') }}</a><p>{{ config('website.address') }}<br>{{ config('website.city') }}</p><a class="footer-details" href="{{ route($locale.'.contact') }}#rekviziti">{{ __('site.footer.details') }}<x-site-icon name="arrow-up-right" /></a></div></div><div class="footer-bottom"><span>© {{ date('Y') }} VIKOMAKSS. {{ __('site.footer.copyright') }}</span><span>{{ __('site.footer.country') }}</span><a href="#top">{{ __('site.footer.top') }}<x-site-icon name="arrow-up-right" /></a></div></div></footer>
</body>
</html>
