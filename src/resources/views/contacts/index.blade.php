@extends('layouts.app')
@section('content')
  @include('contacts.contact')
@endsection
@push('scripts')
  {{-- <script src="{{ mix('example.js') }}"></script> --}}
@endpush