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
   <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataManagement"
        aria-expanded="true" aria-controls="collapseDataManagement">
       <i class="fas fa-database"></i>
        <span>Data Management</span>
      </a>
      <div id="collapseDataManagement" class="collapse {{ Request::is('data_management/*') || Request::is('data')  ? 'show' : '' }}" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Data Management</h6>
          <a class="collapse-item {{ Request::is('data_management/product') || Request::is('data_management/category/create') || Request::is('data_management/category/*/edit') ? 'active' : '' }}" href="{{ route('category.index') }}">Categories</a>
          <a class="collapse-item {{ Request::is('data_management/product') || Request::is('data_management/product/create') || Request::is('data_management/product/*/edit') ? 'active' : '' }}" href="{{ route('product.index') }}">Products</a>
          </div>
      </div>
    </li> 
    
  </ul>
