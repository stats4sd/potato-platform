
@foreach ($tubersAtHarvestProprieties as $key => $value)
    <div class="row">
        <div class="col-6">
            {{$value}} 
        </div>
        <div class="col-6">
        @foreach ($tubersAtHarvests as $tuber)
            @if ($tuber[$key])
            <div class="custom-control custom-radio">
            @if(gettype($tuber[$key])!='array')
                <input type="radio" checked class="custom-control-input"  name="{{$key}}"  id="{{$tuber[$key]}}" value="{{$tuber[$key]}}">
                <label class="custom-control-label" for="{{$tuber[$key]}}">{{  $tuber[$key]  }}</label>
            @else
                <input type="radio" checked class="custom-control-input"  name="{{$key}}"  id="{{$tuber[$key]['id']}}" value="{{$tuber[$key]['id']}}">
                <label class="custom-control-label" for="{{$tuber[$key]['id']}}">{{  $tuber[$key]['label_spanish']  }} ({{ $tuber['choice_campana']['label_spanish'] }})</label>
                
            @endif
            </div>
            @endif
        @endforeach
        </div>
    </div>
    <hr/>
@endforeach
@foreach ($tubersAtHarvestPhotos as $photo )

    <div class="row">
        <div class="col-6">
            <p>Type  {{ $photo->getCustomProperty('photo_type')  }}
            <p>Campana {{ $photo->getCustomProperty('campana')  }}</p>
        </div>
        <div class="col-6">
            <div class="custom-control custom-radio mb-3">
            <input type="radio" checked class="custom-control-input"  name="floweringPhotoPlant"  id="{{$photo->name}}" value="{{$photo->id}}">
            <label class="custom-control-label" for="{{$photo->name}}"><img src="{{$photo->getUrl()}}" class="img-thumbnail" style="height:300px;" /></label>
            </div>
        </div>
    </div>    
@endforeach

<a href="#variety-sprout" data-target="#sprout" class="nav-link variety-tab" role="tab" data-toggle="tab" id="sprout-tab" aria-controls="home" aria-selected="false">Next</a>

