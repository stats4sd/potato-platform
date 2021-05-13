@if ($crud->hasAccess('CreatePhoto'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/create-photo') }}" class="btn btn-primary" data-style="zoom-in"><span class="ladda-label"><i class="la la-plus"></i> Edit Photo</span></a>
@endif