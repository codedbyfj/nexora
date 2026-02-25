@extends('admin::layouts.master')

@section('page_title')
    {{ __('nova::app.admin.builder.title') }}
@endsection

@section('content-wrapper')
    <div class="content full-page">
        <page-builder page-slug="{{ $page_slug }}" layout-data="{{ json_encode($layout ? $layout->layout_json : []) }}"
            schema-url="{{ route('admin.nova.sections.schema') }}"
            save-url="{{ route('admin.nova.builder.save') }}"></page-builder>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/webkul/bagisto-nova/js/admin-builder.js') }}"></script>
@endpush
