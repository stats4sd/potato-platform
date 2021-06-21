
<div>
@foreach ($sproutProprieties as $key => $value)
    <div class="row">
        <div class="col-6">
            {{$value}} 
        </div>
        <div class="col-6">
        @foreach ($sprouts as $sprout)
            @if ($sprout[$key])
            <div class="custom-control custom-radio">
                <input type="radio" checked class="custom-control-input"  name="{{$key}}"  id="{{$sprout[$key]['id']}}" value="{{$sprout[$key]['id']}}">
                <label class="custom-control-label" for="{{$sprout[$key]['id']}}">{{  $sprout[$key]['label_spanish']  }} ({{ $sprout['choice_campana']['label_spanish'] }})</label>
            </div>
            @endif
        @endforeach
        </div>
    </div>
    <hr/>
@endforeach
@foreach ($sproutPhotos as $photo )

    <div class="row">
        <div class="col-6">
            <p>Type  {{ $photo->getCustomProperty('photo_type')  }}
            <p>Campana {{ $photo->getCustomProperty('campana')  }}</p>
        </div>
        <div class="col-6">
            <div class="custom-control custom-radio mb-3">
            <input type="radio" checked class="custom-control-input"  name="floweringPhotoPlant"  id="{{$photo->name}}"  value="{{$photo->id}}">
            <label class="custom-controcheckedl-label" for="{{$photo->name}}"><img src="{{$photo->getUrl()}}" class="img-thumbnail" style="height:300px;" /></label>
            </div>
        </div>
    </div>    
@endforeach


</div>