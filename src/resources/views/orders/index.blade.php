@extends('layouts.app')
@section('content')
    @include('orders.orders')
@endsection
@push('scripts')
    {{-- <script src="{{ mix('example.js') }}"></script> --}}
@endpush