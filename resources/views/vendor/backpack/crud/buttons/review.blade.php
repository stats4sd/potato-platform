@if ($crud->hasAccess('update'))
<a href="{{ url($crud->route.'/'.$entry->getKey().'/review') }} " class="btn btn-xs btn-default"><i class="fa fa-ban"></i>Review</a>
@endif