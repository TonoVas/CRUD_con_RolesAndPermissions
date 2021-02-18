@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper text-center">
                                <p>Editar</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <br>
                    <div class="text text-center"><h2>Editar</h2></div>
                    <br>
                    <hr>
                    <br>
                    <form method="POST" action="{{route('solicitantes.update', $dato->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" required autocomplete="name" value="{{$dato->name}}" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required autocomplete="email" value="{{$dato->email}}"  readonly>

                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" value="{{$dato->password}}" readonly>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado:') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" aria-label="Disabled select example" id="type" name="type">
                                    <option selected>Estado...</option>
                                    <option value="1">Finalizar Proceso</option>
                                    <option value="2">Rechazar</option>
                                  </select>
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
</div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
