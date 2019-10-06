{!!
Share::currentPage($title)
->toFacebook()
->toLinkedin($linkedinSummary)
->toTwitter()
!!}

@section('scripts')
<script src="{{ asset('vendor/social-media-links/js/social-media-links.js') }}"></script>
@endsection