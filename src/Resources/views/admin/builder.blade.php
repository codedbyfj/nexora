@extends('admin::layouts.master')

@section('page_title')
    {{ __('nexora::app.admin.builder.title') }}
@endsection

@section('content-wrapper')
    <div class="content full-page">
        <page-builder page-slug="{{ $page_slug }}" layout-data="{{ json_encode($layout ? $layout->layout_json : []) }}"
            schema-url="{{ route('admin.nexora.sections.schema') }}"
            save-url="{{ route('admin.nexora.builder.save') }}"></page-builder>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/codedbyfj/nexora/js/nexora-builder.js') }}"></script>
@endpush
