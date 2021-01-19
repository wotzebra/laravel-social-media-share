<li>
    <a
        href="{{ $url }}"
        class="{{ $class }} js-track"
        data-action="hit"
        data-category="Share {{ $className }}"
        data-label="{{ $trackingLabel ?? $titleForLayout ?? request()->path() ?? '' }}"
    >
        <i class="{{ $icon }}"></i>
    </a>
</li>

@if($js)
    @push('social-media-link-scripts')
        {!! $js !!}
    @endpush
@endif
