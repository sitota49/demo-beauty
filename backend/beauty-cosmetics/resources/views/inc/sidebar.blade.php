<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      {{-- <div class="sidebar-brand-icon">
        <img src="img/logo/logo2.png">
      </div> --}}
      <div class="sidebar-brand-text mx-3">Beauty Cosmetics</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ Request::is('home') ? "active" : ""}}">
      <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
     <div class="sidebar-heading">
      Master Data
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUserManagement"
        aria-expanded="true" aria-controls="collapseUserManagement">
        <i class="far fa-fw fa-user"></i>
        <span>User Management</span>
      </a>
      <div id="collapseUserManagement" class="collapse {{ Request::is('user_management/*') || Request::is('user')  ? 'show' : '' }}" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">User Management</h6>
          <a class="collapse-item {{ Request::is('user_management/role') || Request::is('user_management/role/create') || Request::is('user_management/role/*/edit') ? 'active' : '' }}" href="{{ route('role.index') }}">Roles</a>
           <a class="collapse-item {{ Request::is('user_management/user') ||  Request::is('user_management/user/*') ? 'active' : '' }}" href="{{ route('user.index') }}">Users</a>
          
        </div>
      </div>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataManagement"
        aria-expanded="true" aria-controls="collapseDataManagement">
       <i class="fas fa-database"></i>
        <span>Data Management</span>
      </a>
      <div id="collapseDataManagement" class="collapse {{ Request::is('data_management/*') || Request::is('data')  ? 'show' : '' }}" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Data Management</h6>
          <a class="collapse-item {{ Request::is('data_management/language') || Request::is('data_management/language/create') || Request::is('data_management/language/*/edit') ? 'active' : '' }}" href="{{ route('language.index') }}">Languages</a>
          <a class="collapse-item {{ Request::is('data_management/quality') || Request::is('data_management/quality/create') || Request::is('data_management/quality/*/edit') ? 'active' : '' }}" href="{{ route('quality.index') }}">Qualities</a>
          <a class="collapse-item {{ Request::is('data_management/industry') || Request::is('data_management/industry/create') || Request::is('data_management/industry/*/edit') ? 'active' : '' }}" href="{{ route('industry.index') }}">Industries</a>
          <a class="collapse-item {{ Request::is('data_management/company_type') || Request::is('data_management/company_type/create') || Request::is('data_management/company_type/*/edit') ? 'active' : '' }}" href="{{ route('company_type.index') }}">Company Types</a>
          <a class="collapse-item {{ Request::is('data_management/skill') || Request::is('data_management/skill/create') || Request::is('data_management/skill/*/edit') ? 'active' : '' }}" href="{{ route('skill.index') }}">Skills</a>
          <a class="collapse-item {{ Request::is('data_management/level') || Request::is('data_management/level/create') || Request::is('data_management/level/*/edit') ? 'active' : '' }}" href="{{ route('level.index') }}">Levels</a>
        </div>
      </div>
    </li> --}}
    
  </ul>
