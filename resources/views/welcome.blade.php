@extends('layouts.backend.master')

@section('content')

    @include('layouts.backend.includes.notice')
    <div class="uk-grid" data-uk-grid-margin>

    </div>
@endsection

@section('custom_footer_js')
    <script>
        // load parsley config (altair_admin_common.js)
        altair_forms.parsley_validation_config();
    </script>
    <script src="bower_components/parsleyjs/dist/parsley.min.js"></script>
    <script src="{{ asset('assets/js/pages/components_notifications.min.js') }} "></script>
@endsection

