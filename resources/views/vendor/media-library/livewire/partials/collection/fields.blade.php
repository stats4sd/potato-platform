<div class="media-library-field">
    <label class="media-library-label">Name</label>
    @if($editableName)
        <input
            dusk="media-library-field-name"
            class="media-library-input"
            type="text"
            name="{{ $mediaItem->propertyAttributeName('name') }}"
            value="{{ $mediaItem->name }}"
        />
    @endif

    @error($mediaItem->propertyErrorName('name'))
        <p class="media-library-field-error">
               {{ $message }}
        </p>
    @enderror
</div>
