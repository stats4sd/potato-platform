
@foreach ($floweringProprieties as $key => $value)
    <div class="row">
        <div class="col-6">
            {{$value}} 
        </div>
        <div class="col-6">
        @foreach ($flowerings as $flowering)
            @if ($flowering[$key])
            <div class="custom-control custom-radio">
                <input type="radio" checked class="custom-control-input"  name="{{$key}}"  id="{{$flowering[$key]['id']}}" value="{{$flowering[$key]['id']}}">
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
            <input type="radio" checked class="custom-control-input"  name="photo_plant"  id="{{$photo->name}}" value="{{$photo->id}}">
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
            <input type="radio" checked class="custom-control-input"  name="photo_leaf"  id="{{$photo->name}}" value="{{$photo->id}}">
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
            <input type="radio" checked class="custom-control-input"  name="photo_flower" id="{{$photo->name}}" value="{{$photo->id}}">
            <label class="custom-control-label" for="{{$photo->name}}"><img src="{{$photo->getUrl()}}" class="img-thumbnail" style="height:300px;" /></label>
            </div>
        </div>
    </div>
    @endif
    
@endforeach

<a href="#variety-fructification" data-target="#fructification" class="nav-link variety-tab" role="tab" data-toggle="tab" id="fructification-tab" aria-controls="home" aria-selected="false">Next</a>
