@extends('backpack::layouts.top_left')

@section('content')

<div class="row pt-4 pl-4">
    <div class="card col-12 col-xl-10">
        <div class="card-header">
            <h2>Variety Review <b>{{ $variety }}</b></h2>
        </div>
        <ul class="nav nav-tabs" id="variety-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="#variety-flowering" data-target="#flowering" class="nav-link variety-tab active" role="tab" data-toggle="tab" id="flowering-tab" aria-controls="home" aria-selected="false">Floración</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#variety-fructification" data-target="#fructification" class="nav-link variety-tab" role="tab" data-toggle="tab" id="fructification-tab" aria-controls="home" aria-selected="false">Fructificación</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#variety-tuber-at-harvest" data-target="#tuber_at_harvest" class="nav-link variety-tab" role="tab" data-toggle="tab" id="tuber_at_harvest-tab" aria-controls="home" aria-selected="false">Tubérculos a la Cosecha</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#variety-sprout" data-target="#sprout" class="nav-link variety-tab" role="tab" data-toggle="tab" id="sprout-tab" aria-controls="home" aria-selected="false">Brotamiento</a>
            </li>
        </ul>
        <form method="POST" action="/admin/variety/variety-reviewed" enctype="multipart/form-data" >

        <input type="hidden" class="custom-control-input"  name="variety_id" value="{{$variety}}">
        <div class="tab-content w-100" id="variety-tabs-content">
            @csrf
            <div class="tab-pane fade  w-100" id="flowering" role="tabpanel" aria-labeledby="flowering-tab">
                @include('varieties.flowering')
                  
            </div>
            <div class="tab-pane fade  w-100" id="fructification" role="tabpanel" aria-labeledby="fructification-tab">

                @include('varieties.fructification')
            </div>
            <div class="tab-pane fade  w-100" id="tuber_at_harvest" role="tabpanel" aria-labeledby="tuber_at_harvest-tab">
      
                @include('varieties.tuber_at_harvest')
            </div>
            <div class="tab-pane fade  w-100" id="sprout" role="tabpanel" aria-labeledby="sprout-tab">
                
                @include('varieties.sprout')
            </div>
            <button type="submit" class="btn btn-primary px-4 mt-3 mb-3" style="float: right;">
                Submit
            </button>
        </div>    
        </form>
        
    </div>
</div>
@endsection

@section('after_scripts')


@push('after_scripts')

@endpush