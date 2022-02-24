@extends('layouts.app')
@section('content')
  @include('products.products')
@endsection
@push('scripts')
  <script src="{{ mix('js/products.js') }}"></script>
@endpush