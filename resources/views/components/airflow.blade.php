<svg {{ $attributes->merge(['viewBox' => '0 0 720 450', 'fill' => 'none', 'aria-hidden' => 'true']) }}>
    @for ($i = 0; $i < 10; $i++)
        <path d="M-30 {{ 350 - $i * 23 }} C 170 {{ 410 - $i * 26 }}, 200 {{ 65 + $i * 14 }}, 410 {{ 100 + $i * 22 }} S 610 {{ 380 - $i * 9 }}, 780 {{ 190 + $i * 17 }}" stroke="currentColor" stroke-width="1" opacity="{{ .13 + $i * .025 }}"/>
    @endfor
</svg>
