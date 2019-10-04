{!!
Share::currentPage($title)
->toFacebook()
->toLinkedin($linkedinSummary)
->toTwitter()
!!}

@section('scripts')
<script src="{{ mix('js/social-media-links.js') }}"></script>
@endsection