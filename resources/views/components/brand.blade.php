@props(['light' => false])
<span {{ $attributes->class(['brand', 'brand--light' => $light]) }}>
    <svg class="brand-mark" viewBox="0 0 49 39" fill="none" aria-hidden="true"><path d="m5 5 14 29h9L43 5H32L23 24 15 5H5Z" fill="currentColor"/><path d="M1 11h15M0 17h19M0 23h22" stroke="var(--brand-cut, white)" stroke-width="2.5"/></svg>
    <span class="brand-word">VIKOMAKSS<span class="brand-caption">{{ __('site.home.eyebrow') }}</span></span>
</span>
