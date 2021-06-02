@extends('layouts.app')

@section('styles')
@livewireStyles
@endsection


@section('content')

<form method="POST">
    @csrf

    <input id="name" name="name">

    <x-media-library-attachment name="avatar"/>

    <button type="submit">Submit</button>
</form>


@endsection


@section('javascript')
    @livewireScripts
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>

@endsection