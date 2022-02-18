@extends('layouts.app')
@section('content')
  @include('products.products')
@endsection
@push('scripts')
  {{-- <script src="{{ mix('example.js') }}"></script> --}}
@endpush