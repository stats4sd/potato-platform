
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
         <!-- start here -->
          <h3>Catálogo de variedades de papa nativa</h3> 
           
          <div>
            <div>
                <h5>Seleccione la variedad</h5>
                    <b-card-group deck>
                        <b-card>                   
                            <div>       
                                <b-form class="position-relative p-3">
                                    <b-form-group label="Región" label-for="form-region" label-cols-lg="2">
                                        <b-input-group>
                                        <b-input-group-prepend is-text>
                                            <b-icon icon="map"></b-icon>
                                        </b-input-group-prepend>
                                            <b-form-select v-model="selected" :options="options"></b-form-select>
                                        </b-input-group>
                                    </b-form-group>
                                    <b-form-group label="Agricultor(a)" label-for="form-agricultor" label-cols-lg="2">
                                        <b-input-group>
                                        <b-input-group-prepend is-text>
                                            <b-icon icon="person-fill"></b-icon>
                                        </b-input-group-prepend>
                                            <b-form-select v-model="selected" :options="options"></b-form-select>
                                        </b-input-group>
                                    </b-form-group>
                                    <b-form-group label="Variedad" label-for="form-variedad" label-cols-lg="2">
                                        <b-input-group>
                                        <b-input-group-prepend is-text>
                                            <b-icon icon="card-text"></b-icon>
                                        </b-input-group-prepend>
                                            <b-form-select v-model="selected" :options="options"></b-form-select>
                                        </b-input-group>
                                    </b-form-group>
                                    <div class="d-flex justify-content-center">
                                        <b-button >Enviar</b-button>
                                    </div>    
                                </b-form>
                            </div>
                        </b-card>

                        <b-card>
                            <div>
                                <b-form class="position-relative p-3">
                                    <b-form-group label="Código" label-for="form-codigo" label-cols-lg="2">
                                    <b-input-group>
                                    <b-form-input
                                    id="form_codigo"
                                    placeholder="Ingrese el código de la variedad"
                                    >
                                    </b-form-input-group>
                                    </b-form-input>
                                    </b-form-group>
                                    <div class="d-flex justify-content-center">
                                        <b-button >Enviar</b-button>
                                    </div>
                                </b-form>
                            </div>
                        </b-card>
                    </b-card-group>
            </div>
        </div>
    </div>
</div>
</div>

@endsection