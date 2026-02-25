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
    <style>
        .nova-frontend .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush
