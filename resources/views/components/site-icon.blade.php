@props(['name' => 'arrow-right'])
<svg {{ $attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.6', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round', 'aria-hidden' => 'true']) }}>
    @switch($name)
        @case('arrow-up-right') <path d="M6 18 18 6M6 6h12v12"/> @break
        @case('arrow-right') <path d="M4 12h15m-6-6 6 6-6 6"/> @break
        @case('arrow-left') <path d="M20 12H5m6-6-6 6 6 6"/> @break
        @case('phone') <path d="m8 3 3 5-3 3a16 16 0 0 0 5 5l3-3 5 3-1 4c-1 3-8 0-12-4S1 5 4 4l4-1Z"/> @break
        @case('mail') <rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 6 9 7 9-7"/> @break
        @case('pin') <path d="M19 10c0 5-7 11-7 11S5 15 5 10a7 7 0 1 1 14 0Z"/><circle cx="12" cy="10" r="2.5"/> @break
        @case('menu') <path d="M4 7h16M4 12h16M4 17h16"/> @break
        @case('expand') <path d="M8 3H3v5m13-5h5v5M3 16v5h5m13-5v5h-5"/> @break
        @case('close') <path d="m6 6 12 12M6 18 18 6"/> @break
        @case('check') <path d="m5 12 4 4L19 6"/> @break
        @case('ventilation') <path d="M3 8h12a3 3 0 1 0-3-3M3 12h16a3 3 0 1 1-3 3M3 16h5a3 3 0 1 1-3 3"/> @break
        @case('cooling') <path d="M12 2v20M3.34 7l17.32 10M3.34 17 20.66 7M9 4l3 3 3-3M9 20l3-3 3 3M3.5 10l4-1-1-4M20.5 14l-4 1 1 4M6.5 19l1-4-4-1M17.5 5l-1 4 4 1"/> @break
        @case('design') <path d="m4 20 16-16 2 2L6 22H2v-4L18 2l2 2M6 8l-4-4 2-2 4 4M16 18l4 4 2-2-4-4M4 20l2 2"/> @break
        @case('maintenance') <path d="m14 6 4 4 4-4a7 7 0 0 1-9 9l-6 6a3 3 0 0 1-4-4l6-6a7 7 0 0 1 9-9l-4 4Z"/> @break
        @case('building') <path d="M5 22V4l10-2v20M15 8h5v14M2 22h20M9 7h2M9 11h2M9 15h2M9 19h2"/> @break
        @default <path d="M4 12h15m-6-6 6 6-6 6"/>
    @endswitch
</svg>
