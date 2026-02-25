@extends('shop::layouts.master')

@section('page_title')
    {{ __('nexora::app.shop.home.page-title') }}
@endsection

@section('content-wrapper')
    <div class="nexora-frontend">
        {!! $html !!}
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/codedbyfj/nexora/css/nova.css') }}">
@endpush
