<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('/img/sidebar-1.jpg') }}">
    <div class="sidebar-wrapper">
        <ul class="nav">
        <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">
            <i class="fa fa-home"></i>
                <p>{{ __('Home') }}</p>
            </a>
        </li>
        <hr>
        <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
            <a class="nav-link" href="{{ url ('/user') }}">
            <i class="fa fa-table"></i>
                <p>{{ __('Estado de DPI') }}</p>
            </a>
        </li>
        @role('super-admin')
        <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
            <a class="nav-link" href="{{ url ('solicitantes') }}"">
            <i class="fa fa-table"></i>
                <p>{{ __('DPI en proceso') }}</p>
            </a>
        </li>
        @endrole
        </ul>
    </div>
</div>
