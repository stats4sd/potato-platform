
@extends('layouts.app')
@section('styles')
    @livewireStyles
@endsection
@section('content')
@livewireScripts

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md mt-4">
            <h2>Upload Photos</h2>
        </div>
    </div>
</div>
<form method="POST">
    @csrf
    Name: <input type="text" name="name" value="name">

    <x-media-library-attachment multiple name="images"/>

    <button type="submit">Submit</button>
</form>



@endsection

