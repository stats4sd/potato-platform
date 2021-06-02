@include('media-library::components.partials.media-library-once')
<livewire:media-library
    :media="$media"
    :name="$name"
    :rules="$rules"
    :multiple="$multiple"
    :maxItems="$determineMaxItems()"
    :view="$view ?? null"
    :sortable="false"
    :listView="$determineListViewName()"
    :itemView="$determineItemViewName()"
    :propertiesView="$propertiesView ?? null"
    :editableName="$editableName"
/>
