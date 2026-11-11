@props(['project'])
<article class="project-card">
    <div class="project-card-image">
        <img src="{{ asset($project->image) }}" alt="{{ $project->translation('title') }}" width="640" height="440" loading="lazy">
        <span class="project-card-arrow" aria-hidden="true"><x-site-icon name="expand" /></span>
    </div>
    <div class="project-card-info">
        <span class="overline muted">{{ $project->locationLabel() }}</span>
        <h3><button class="project-card-trigger" type="button" data-project-open="project-content-{{ $project->id }}" aria-haspopup="dialog" aria-controls="project-dialog" aria-label="{{ __('site.projects.open', ['project' => $project->translation('title')]) }}">{{ $project->translation('title') }}</button></h3>
        <p>{{ $project->translation('summary') }}</p>
    </div>
    <template id="project-content-{{ $project->id }}">
        <img class="project-dialog-image" src="{{ asset($project->image) }}" alt="{{ $project->translation('title') }}" width="1200" height="780">
        <div class="project-dialog-body">
            <p class="overline muted">{{ $project->locationLabel() }}</p>
            <h2 id="project-dialog-title">{{ $project->translation('title') }}</h2>
            <p class="body-lead" id="project-dialog-description">{{ $project->translation('description') }}</p>
            <dl class="project-dialog-specs" aria-label="{{ __('site.projects.technical') }}">
                <div class="project-dialog-scope"><dt>{{ __('site.common.scope') }}</dt><dd>@foreach($project->services as $service){{ __('site.services.items.'.$service.'.name') }}@unless($loop->last), @endunless @endforeach</dd></div>
                @if($project->area)<div><dt>{{ __('site.common.area') }}</dt><dd>{{ number_format($project->area, 0, ',', ' ') }} <span>m²</span></dd></div>@endif
                @if($project->airflow)<div><dt>{{ __('site.common.airflow') }}</dt><dd>{{ number_format($project->airflow, $project->airflow == floor($project->airflow) ? 0 : 1, app()->getLocale() === 'lv' ? ',' : '.', ' ') }} <span>m³/s</span></dd></div>@endif
                @if($project->cooling)<div><dt>{{ __('site.common.cooling') }}</dt><dd>{{ number_format($project->cooling, 0, ',', ' ') }} <span>kW</span></dd></div>@endif
            </dl>
        </div>
    </template>
</article>
