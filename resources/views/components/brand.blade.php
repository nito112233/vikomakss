@props(['light' => false])
<span {{ $attributes->class(['brand', 'brand--light' => $light]) }} role="img" aria-label="Vikomakss">
    <span class="brand-logo" style="--logo-image: url('{{ asset('images/vikomakss-logo.svg') }}')" aria-hidden="true"></span>
</span>
