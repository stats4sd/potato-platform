@include('media-library::components.partials.media-library-once')
<livewire:media-library
    :media="$media"
    :model="$model"
    :name="$name"
    :rules="$rules"
    :maxItems="$maxItems"
    :multiple="true"
    :sortable="$sortable"
    :view="$view ?? null"
    :listView="$listView"
    :itemView="$itemView"
    :propertiesView="$propertiesView ?? null"
    :fieldsView="$fieldsView ?? null"
    :editableName="$editableName"
/>
