@extends('layouts.app')
@section('content')
    @include('homePage.bannerHero')
    @include('homePage.monthCategories')
    @include('homePage.featuredProducts')
@endsection
@push('scripts')
    {{-- <script src="{{ mix('example.js') }}"></script> --}}
@endpush