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
                                <p>CRUD</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <br>
                    @if (Auth::user()->estado == 1)
                    <div class="alert alert-success text-center" role="alert">
                        <br>
                        <br>
                        <br>
                        El tramite de su DPI fue finalizado
                        <br>
                        <br>
                        <br>
                        Proceso Finalizado...
                        <br>
                        <br>
                        <br>
                    </div>
                    @elseif (Auth::user()->estado==2)
                    <div class="alert alert-warning text-center" role="alert">
                        <br>
                        <br>
                        <br>
                        El tramite de su DPI fue rechazada
                        <br>
                        <br>
                        <br>
                        Porfavor acercar a nuestras oficinas para que su proceso de DPI sea exitoso...
                        <br>
                        <br>
                        <br>
                    </div>
                    @elseif (Auth::user()->estado == 0)
                    <div class="alert alert-danger text-center" role="alert">
                        <br>
                        <br>
                        <br>
                        SU DPI esta siendo tramitado
                        <br>
                        <br>
                        <br>
                        Porfavor esperar...
                        <br>
                        <br>
                        <br>
                    </div>
                    @endif
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
