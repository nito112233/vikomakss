@extends('layouts.site')
@section('title', __('site.meta.services'))
@section('content')
<section class="page-intro section-shell"><p class="overline">{{-- <span class="status-dot"></span> --}}{{ __('site.services.eyebrow') }}</p><h1>{{ __('site.services.title') }}</h1><div class="intro-bottom"><p class="body-lead">{{ __('site.services.intro') }}</p>{{-- <span class="intro-number">01 — 04</span> --}}</div><x-airflow class="intro-flow" /></section>
<div class="service-jump-nav section-shell" aria-label="{{ __('site.services.list_label') }}">@foreach(__('site.services.items') as $key => $service)<a href="#{{ $key }}"><x-site-icon :name="$key" />{{ $service['name'] }}</a>@endforeach</div>
<section class="service-details section-shell">@foreach(__('site.services.items') as $key => $service)<article class="service-detail" id="{{ $key }}"><div class="service-detail-number" aria-hidden="true">{{-- 0{{ $loop->iteration }} --}}</div><div class="service-detail-body"><p class="overline">{{ $service['short'] }}</p><h2><x-site-icon :name="$key" />{{ $service['name'] }}</h2><p class="body-lead">{{ $service['description'] }}</p><ul>@foreach($service['bullets'] as $bullet)<li><x-site-icon name="check" />{{ $bullet }}</li>@endforeach</ul><a class="text-link" href="{{ route(app()->getLocale().'.contact') }}">{{ __('site.common.contact_us') }}<x-site-icon name="arrow-up-right" /></a></div><div class="service-detail-visual service-detail-visual--{{ $key }}">
    @php
        $serviceImage = match ($key) {
            'ventilation' => 'industrial-ductwork.jpg',
            'cooling' => 'air-conditioning.jpg',
            'design' => 'engineering-workspace.jpg',
            'maintenance' => 'ventilation-detail.jpg',
        };
    @endphp
    <img src="{{ asset('images/stock/'.$serviceImage) }}" alt="{{ __('site.services.items.'.$key.'.image_alt') }}" width="1800" height="1200" loading="lazy">
    <span class="photo-label">{{ __('site.common.illustration') }}</span>
</div></article>@endforeach</section>
<section class="process-section"><div class="section-shell section-space"><div class="section-heading"><div><p class="overline">{{ __('site.services.process_label') }}</p><h2>{{ __('site.services.process_title') }}</h2></div>{{-- <p class="body-lead">{{ __('site.services.process_intro') }}</p> --}}</div><div class="process-grid">@foreach(__('site.services.steps') as $step)<article><span class="process-number">0{{ $loop->iteration }}</span><h3>{{ $step['name'] }}</h3><p>{{ $step['text'] }}</p></article>@endforeach</div></div></section>
{{-- <div class="sectors-strip section-shell"><p class="overline">{{ __('site.services.sectors_label') }}</p><div>@foreach(__('site.services.sectors') as $sector)<span>{{ $sector }}</span>@endforeach</div></div> --}}
@endsection
