
@extends('layouts.app')
@section('content')

 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
         <!-- start here -->
           <h3>Descargar Datos Agronómicos</h3>

           <link href ="{{asset('css/style.css')}}" rel="stylesheet"/>

                <div>       
                    <b-form class="position-relative p-3">
                        <b-form-group label="Fecha" label-for="form-fecha" label-cols-lg="2">
                            <b-input-group>
                            <b-input-group-prepend is-text>
                                <b-icon icon="calendar3"></b-icon>
                            </b-input-group-prepend>
                                <b-form-select v-model="selected" :options="options"></b-form-select>
                            </b-input-group>
                        </b-form-group>
                        <b-form-group label="Región" label-for="form-name" label-cols-lg="2">
                            <b-input-group>
                            <b-input-group-prepend is-text>
                                <b-icon icon="map"></b-icon>
                            </b-input-group-prepend>
                                <b-form-select v-model="selected" :options="options"></b-form-select>
                            </b-input-group>
                        </b-form-group>
                        <div class="d-flex justify-content-center">
                            <b-dropdown class="m-md-2" text="Descargar">
                                <b-dropdown-item>xlsx</b-dropdown-item>
                                <b-dropdown-item>csv</b-dropdown-item>
                            </b-dropdown>
                        </div>
                    </b-form>
                </div>
        </div>
    </div>
</div>


@endsection
