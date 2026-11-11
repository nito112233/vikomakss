@extends('layouts.site')
@section('title', __('site.meta.projects'))
@section('content')
<section class="page-intro section-shell"><p class="overline">{{-- <span class="status-dot"></span> --}}{{ __('site.projects.eyebrow') }}</p><h1>{{ __('site.projects.title') }}</h1><div class="intro-bottom"><p class="body-lead">{{ __('site.projects.intro') }}</p>{{-- <span class="intro-number">{{ __('site.projects.archive') }}</span> --}}</div><x-airflow class="intro-flow" /></section>
<section class="portfolio-section section-shell"><div class="portfolio-toolbar"><span class="portfolio-count">{{ str_pad($projects->count(), 2, '0', STR_PAD_LEFT) }} <span>{{ __($projects->count() === 1 ? 'site.projects.count_single' : 'site.projects.count') }}</span></span></div><div class="project-grid portfolio-grid">@forelse($projects as $project)<x-project-card :project="$project" />@empty<p class="empty-state">{{ __('site.projects.empty') }}</p>@endforelse</div></section>
@endsection
