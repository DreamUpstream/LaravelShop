@extends('layouts.app')
@section('content')
  @include('products.productPage')
@endsection
@push('scripts')
  {{-- <script src="{{ mix('js/products.js') }}"></script> --}}
@endpush