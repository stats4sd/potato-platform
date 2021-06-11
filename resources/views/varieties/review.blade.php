@extends('backpack::layouts.top_left')

@section('content')

<div class="row pt-4 pl-4">
    <div class="card col-12 col-xl-10">
        <div class="card-header">
            <h2>Variety Review <b>{{ $variety }}</b></h2>
        </div>
        <ul class="nav nav-tabs" id="variety-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="#variety-flowering" data-target="#flowering" class="nav-link variety-tab" role="tab" data-toggle="tab" id="flowering-tab" aria-controls="home" aria-selected="false">Floración</a>
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
        <div class="tab-content w-100" id="variety-tabs-content">

        <form method="POST" action="/admin/variety-reviewed" enctype="multipart/form-data" >
            <div class="tab-pane fade  w-100" id="flowering" role="tabpanel" aria-labeledby="flowering-tab">
                <div class="card-body">
                    @foreach ($floweringProprieties as $key => $value)
                        <div class="row">
                            <div class="col-6">
                                {{$value}} 
                            </div>
                            <div class="col-6">
                            @foreach ($flowerings as $flowering)
                                @if ($flowering[$key])
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input"  name="{{$key}}"  id="{{$flowering[$key]['id']}}">
                                    <label class="custom-control-label" for="{{$flowering[$key]['id']}}">{{  $flowering[$key]['label_spanish']  }} ({{ $flowering['choice_campana']['label_spanish'] }})</label>
                                </div>
                                @endif
                            @endforeach
                            </div>
                        </div>
                        <hr/>
                    @endforeach
                    @foreach ($floweringPhotos as $photo )
                    @if ($photo->getCustomProperty('photo_type')=='Photo Plant')

                        <div class="row">
                            <div class="col-6">
                                <p>Type  {{ $photo->getCustomProperty('photo_type')  }}
                                <p>Campana {{ $photo->getCustomProperty('campana')  }}</p>
                            </div>
                            <div class="col-6">
                                <div class="custom-control custom-radio mb-3">
                                <input type="radio" class="custom-control-input"  name="floweringPhotoPlant"  id="{{$photo->name}}">
                                <label class="custom-control-label" for="{{$photo->name}}"><img src="{{$photo->getUrl()}}" class="img-thumbnail" style="height:300px;" /></label>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($photo->getCustomProperty('photo_type')=='Photo Leaf')

                        <div class="row">
                            <div class="col-6">
                                <p>Type  {{ $photo->getCustomProperty('photo_type')  }}
                                <p>Campana {{ $photo->getCustomProperty('campana')  }}</p>
                            </div>
                            <div class="col-6">
                                <div class="custom-control custom-radio mb-3">
                                <input type="radio" class="custom-control-input"  name="floweringPhotoLeaf"  id="{{$photo->name}}">
                                <label class="custom-control-label" for="{{$photo->name}}"><img src="{{$photo->getUrl()}}" class="img-thumbnail" style="height:300px;" /></label>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($photo->getCustomProperty('photo_type')=='Photo Flower')
                        <div class="row">
                            <div class="col-6">
                                <p>Type  {{ $photo->getCustomProperty('photo_type')  }}
                                <p>Campana {{ $photo->getCustomProperty('campana')  }}</p>
                            </div>
                            <div class="col-6">
                                <div class="custom-control custom-radio mb-3">
                                <input type="radio" class="custom-control-input"  name="floweringPhotoFlower"  id="{{$photo->name}}">
                                <label class="custom-control-label" for="{{$photo->name}}"><img src="{{$photo->getUrl()}}" class="img-thumbnail" style="height:300px;" /></label>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                    @endforeach

                    <a href="#variety-fructification" data-target="#fructification" class="nav-link variety-tab" role="tab" data-toggle="tab" id="fructification-tab" aria-controls="home" aria-selected="false">Next</a>
                </div>
            </div>
            <div class="tab-pane fade w-100" id="fructification" role="tabpanel" aria-labeledby="fructification-tab">
        


            </div>
            <div class="tab-pane fade  w-100" id="tuber_at_harvest" role="tabpanel" aria-labeledby="tuber_at_harvest-tab">
      
            </div>
            <div class="tab-pane fade  w-100" id="sprout" role="tabpanel" aria-labeledby="sprout-tab">
                
            </div>
            <button type="submit" class="site-btn my-4" >
                Submit
            </button>
        </form>
        
    </div>
</div>
@endsection

@section('after_scripts')


@push('after_scripts')

@endpush