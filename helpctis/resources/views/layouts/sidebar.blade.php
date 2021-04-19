<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('helpctis/dist/img/hospital.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">HELP CTIS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('helpctis/dist/img/user.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if(auth()->user()->position=='manager')
                    <li class="nav-item">
                        <a href="{{ url('manager/home') }}" class="nav-link {{ Request::is('manager/home') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-header">MENUS</li>
                    <li class="nav-item">
                        <a href="{{ route('test-centre.index') }}" class="nav-link {{ Request::is('test-centre') || Request::is('test-centre/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-map-marker-alt"></i>
                            <p>Test Centre</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('test-kit.index') }}" class="nav-link {{ Request::is('test-kit') || Request::is('test-kit/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-medkit"></i>
                            <p>Test Kit</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('centre-officer.index') }}" class="nav-link {{ Request::is('centre-officer') || Request::is('centre-officer/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>Officer</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tester.index') }}" class="nav-link {{ Request::is('tester') || Request::is('tester/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>Tester</p>
                        </a>
                    </li>
                @elseif(auth()->user()->position=='tester')
                    <li class="nav-item">
                        <a href="{{ url('testers/home') }}" class="nav-link {{ Request::is('testers/home') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-header">MENUS</li>
                    <li class="nav-item">
                        <a href="{{ route('test-kit.index') }}" class="nav-link {{ Request::is('test-kit') || Request::is('test-kit/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-medkit"></i>
                            <p>Test Kit</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('patient.index') }}" class="nav-link {{ Request::is('patient') || Request::is('patient/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>Patient</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('covid-test.index') }}" class="nav-link {{ Request::is('covid-test') || Request::is('covid-test/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-medical"></i>
                            <p>Covid Test</p>
                        </a>
                    </li>
                @elseif(auth()->user()->position=='officer')
                    <li class="nav-item">
                        <a href="{{ url('officer/home') }}" class="nav-link {{ Request::is('officer/home') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-header">MENUS</li>
                    <li class="nav-item">
                        <a href="{{ route('test-centre.index') }}" class="nav-link {{ Request::is('test-centre') || Request::is('test-centre/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-map-marker-alt"></i>
                            <p>Test Centre</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('test-kit.index') }}" class="nav-link {{ Request::is('test-kit') || Request::is('test-kit/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-medkit"></i>
                            <p>Test Kit</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('centre-officer.index') }}" class="nav-link {{ Request::is('centre-officer') || Request::is('centre-officer/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>Officer</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tester.index') }}" class="nav-link {{ Request::is('tester') || Request::is('tester/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>Tester</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('patient.index') }}" class="nav-link {{ Request::is('patient') || Request::is('patient/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>Patient</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('covid-test.index') }}" class="nav-link {{ Request::is('covid-test') || Request::is('covid-test/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-medical"></i>
                            <p>Covid Test</p>
                        </a>
                    </li>
                @elseif(auth()->user()->position=='patient')
                    <li class="nav-item">
                        <a href="{{ url('patients/home') }}" class="nav-link {{ Request::is('patients/home') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-header">MENUS</li>
                    <li class="nav-item">
                        <a href="{{ route('patient.index') }}" class="nav-link {{ Request::is('patient') || Request::is('patient/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>Bio</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('covid-test.index') }}" class="nav-link {{ Request::is('covid-test') || Request::is('covid-test/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-medical"></i>
                            <p>Covid Test</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
