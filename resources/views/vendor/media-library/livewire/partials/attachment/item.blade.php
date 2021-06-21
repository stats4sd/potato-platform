<div class="media-library-item" :key="$mediaItem->uuid">
    @include('media-library::livewire.partials.thumb')

    <div class="media-library-properties">
        @if((! $mediaItem->hideError) && ($mediaItem->uploadError || $errors->has($mediaItem->errorName())))
            @include('media-library::livewire.partials.item-error', ['message' => $mediaItem->uploadError ?? $errors->first($mediaItem->errorName())])
        @else
            @include($propertiesView)

            <div className="media-library-property">
                <button type="button" dusk="remove" class="media-library-text-link"
                        wire:click="remove('{{ $mediaItem->uuid }}')">Remove
                </button>
            </div>
        @endif
    </div>

    @include('media-library::livewire.partials.hidden-fields')
</div>
