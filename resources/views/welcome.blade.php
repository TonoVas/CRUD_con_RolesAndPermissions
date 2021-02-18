@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __()])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card card-hidden mb-3">
        <div class="card-header card-header-primary text-center">
          <h3>Formulario de Solicitante de DPI</h3>
        </div>

        <div class="card-body">
          @if (session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
          @endif
            <div class="text text-center"><h3>Formulario</h3></div>
            <br>
            <hr>
            <br>
            <form method="POST" action="{{ route('home.store') }}" enctype="multipart/form-data">
                @csrf
                <br>
                <div class="form-group row">
                    <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha: ') }}</label>
                    <div class="col-md-6">
                        <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha">
                        @error('fecha')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido:') }}</label>
                    <div class="col-md-6">
                        <input id="apellido" type="apellido" class="form-control @error('name') is-invalid @enderror" name="apellido">
                        @error('apellido')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion:') }}</label>
                    <div class="col-md-6">
                        <input id="direccion" type="direccion" class="form-control @error('direccion') is-invalid @enderror" name="direccion">
                        @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="cel" class="col-md-4 col-form-label text-md-right">{{ __('Telefono:') }}</label>
                    <div class="col-md-6">
                        <input minlength="8" maxlength="8" id="cel" type="text" class="form-control @error('cel') is-invalid @enderror" name="cel" pattern="[0-9]+">
                        @error('cel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="departamento" class="col-md-4 col-form-label text-md-right">{{ __('Departamento:') }}</label>
                    <div class="col-md-8">
                        <select class="form-select col-md-10 col-form-label text-md-right" aria-label="Default select example" name="departamento" id="departamento">
                            <option selected><h4>Seleccione su Departamento</h4></option>
                            <option value="1">Alta Verapaz</option>
                            <option value="2">Baja Verapaz</option>
                            <option value="3">Chimaltenango</option>
                            <option value="4">Chiquimula</option>
                            <option value="5">Petén</option>
                            <option value="6">Progreso</option>
                            <option value="7">Quiché</option>
                            <option value="8">Escuintla</option>
                            <option value="9">Guatemala</option>
                            <option value="10">Huehuetenango</option>
                            <option value="11">Izabal</option>
                            <option value="12">Jalapa</option>
                            <option value="13">Jutiapa</option>
                            <option value="14">Quetzaltenango</option>
                            <option value="15">Retalhuleu</option>
                            <option value="16">Sacatepéquez</option>
                            <option value="17">San Marcos</option>
                            <option value="18">Santa Rosa</option>
                            <option value="19">Sololá</option>
                            <option value="20">Suchitepéquez</option>
                            <option value="21">Totonicapán</option>
                            <option value="22">Zacapa</option>
                          </select>
                        @error('departamento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="municipio" class="col-md-4 col-form-label text-md-right">{{ __('Municipio:') }}</label>
                    <div class="col-md-6">
                        <input id="municipio" type="municipio" class="form-control @error('municipio') is-invalid @enderror" name="municipio">
                        @error('municipio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="bmd-form-group{{ $errors->has('foto') ? ' has-danger' : '' }}">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                      </div>
                      <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                    @if ($errors->has('foto'))
                      <div id="foto-error" class="error text-danger pl-3" for="foto" style="display: block;">
                        <strong>{{ $errors->first('foto') }}</strong>
                      </div>
                    @endif
                  </div>
                <br>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group row mb-0 text-center">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Enviar') }}
                        </button>
                    </div>
                </div>
                <br>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
