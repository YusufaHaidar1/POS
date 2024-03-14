@extends('layout.app')

{{-- Customize Layout Section --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

{{-- Content Body: Main Page Content --}}

@section('content_body')
    <p>Welcome to this beautiful admin panel.</p>
@stop

{{-- Push Extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push Extra Scripts --}}

@push('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@endpush

