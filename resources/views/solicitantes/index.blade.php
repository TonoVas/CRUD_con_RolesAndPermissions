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
                                <p>Tabla de usuarios</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        @can('create user')
                        <a href="" class="btn btn-success">Nuevo Usuario</a>
                        @endcan
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                        <br>
                                <table class="table table-bordered  table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Rol</th>
                                            <th scope="col">Opción</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuario as $dato)
                                            <tr>
                                                <td>{{$dato->id}}</td>
                                                <td>{{$dato->name}}</td>
                                                <td>{{$dato->email}}</td>
                                                <td>{{$dato->estado}}</td>
                                                <td>{{$dato->roles->implode('name',',')}}</td>
                                                <td>{{$dato->proceso}}
                                                    <a href="{{route('solicitantes.edit', $dato->id)}}" class="btn btn-success"> {{_('Estado')}}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper text-center">
                                <p>Tabla de usuarios</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        @can('create user')
                        <a href="" class="btn btn-success">Nuevo Usuario</a>
                        @endcan
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                        <br>
                                <table class="table table-bordered  table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">Fecha de nacimiento</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellido</th>
                                            <th scope="col">Direccion</th>
                                            <th scope="col">Telefono</th>
                                            <th scope="col">Departamento</th>
                                            <th scope="col">Municipio</th>
                                            <th scope="col">Fotografía</th>
                                            <th scope="col">email</th>
                                            <th scope="col">password</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($solicitante as $dato)
                                            <tr>
                                                <td>{{$dato->id}}</td>
                                                <td>{{$dato->fecha}}</td>
                                                <td>{{$dato->name}}</td>
                                                <td>{{$dato->apellido}}</td>
                                                <td>{{$dato->direccion}}</td>
                                                <td>{{$dato->cel}}</td>
                                                <td>{{$dato->departamento}}</td>
                                                <td>{{$dato->municipio}}</td>
                                                <td>
                                                    <img src="{{ asset('storage').'/'.$dato->foto}}" alt="60" width="60">
                                                </td>
                                                <td>{{$dato->email}}</td>
                                                <td>{{$dato->password}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
