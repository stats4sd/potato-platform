
<div>
@foreach ($fructificationProprieties as $key => $value)
    <div class="row">
        <div class="col-6">
            {{$value}} 
        </div>
        <div class="col-6">
        @foreach ($fructifications as $fructification)
            @if ($fructification[$key])
            <div class="custom-control custom-radio">
                <input type="radio" checked class="custom-control-input"  name="{{$key}}"  id="{{$fructification[$key]['id']}}" value="{{$fructification[$key]['id']}}">
                <label class="custom-control-label" for="{{$fructification[$key]['id']}}">{{  $fructification[$key]['label_spanish']  }} ({{ $fructification['choice_campana']['label_spanish'] }})</label>
            </div>
            @endif
        @endforeach
        </div>
    </div>
    <hr/>
@endforeach
@foreach ($fructificationPhotos as $photo )

    <div class="row">
        <div class="col-6">
            <p>Type  {{ $photo->getCustomProperty('photo_type')  }}
            <p>Campana {{ $photo->getCustomProperty('campana')  }}</p>
        </div>
        <div class="col-6">
            <div class="custom-control custom-radio mb-3">
            <input type="radio" checked class="custom-control-input"  name="floweringPhotoPlant"  id="{{$photo->name}}"  value="{{$photo->id}}">
            <label class="custom-control-label" for="{{$photo->name}}"><img src="{{$photo->getUrl()}}" class="img-thumbnail" style="height:300px;" /></label>
            </div>
        </div>
    </div>    
@endforeach

<a href="#variety-tuber-at-harvest" data-target="#tuber_at_harvest" class="nav-link variety-tab" role="tab" data-toggle="tab" id="tuber_at_harvest-tab" aria-controls="home" aria-selected="false">Next</a>

</div>