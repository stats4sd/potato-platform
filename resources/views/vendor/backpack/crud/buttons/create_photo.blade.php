@if ($crud->hasAccess('create-photo'))
	<a href="{{ url($crud->route.'/create-photo') }}" class="btn btn-primary" data-style="zoom-in"><span class="ladda-label"><i class="la la-plus"></i> {{ trans('backpack::crud.add') }} {{ $crud->entity_name }}</span></a>
@endif