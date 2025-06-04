@extends('layouts.app')

@section('content')
  <div id="app"></div>
  @vite('resources/js/app.js')

@endsection

@push('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endpush
