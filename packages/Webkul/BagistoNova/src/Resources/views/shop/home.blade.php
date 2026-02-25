@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.home.page-title') }}
@endsection

@section('content-wrapper')
    <div class="nova-frontend">
        {!! $html !!}
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/webkul/bagisto-nova/css/nova.css') }}">
@endpush
