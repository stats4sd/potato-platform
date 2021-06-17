
@extends('layouts.app')

@section('styles')
 
@endsection
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md mt-4">
            <h2>Upload Photos</h2>
            @if(session('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {!! session('error') !!}
                </div>
                
            @endif
            
            
        </div>
    </div>
</div>

<upload-photos :testImage='{{$testImage}}'></upload-photos>

@endsection


