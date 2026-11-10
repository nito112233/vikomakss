@props(['project'])
<a class="project-card" href="{{ route(app()->getLocale().'.projects.show', $project) }}">
    <div class="project-card-image"><img src="{{ asset($project->image) }}" alt="{{ $project->translation('title') }}" width="640" height="440" loading="lazy"><span class="project-card-category">{{ __('site.categories.'.$project->category) }}</span><span class="project-card-arrow"><x-site-icon name="arrow-up-right" /></span></div>
    <div class="project-card-info"><span class="overline muted">{{ __('site.common.riga') }}</span><h3>{{ $project->translation('title') }}</h3><p>{{ $project->translation('summary') }}</p></div>
</a>
