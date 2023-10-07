<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand">

    <a href="{{route('dashboard.user')}}" wire:navigate class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="{{asset('img/layouts/downloads.ico')}}" class="img-fluid" alt="University Logo" />
      </span>

      <span class="app-brand-text demo menu-text fw-bolder ms-2"></span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">

    <li class="menu-item @if(Request::segment(1)=='dashboard') active @endif">
      <a href="{{route('dashboard.user')}}" wire:navigate class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="">Dashboard</div>
      </a>
    </li>
   
    <li class="menu-item @if(Request::segment(1)=='user') active @endif">
      <a href="{{route('users.index')}}" wire:navigate class="menu-link">
        <i class="menu-icon tf-icons bx bx-user-check"></i>
        <div data-i18n="Analytics">Users</div>
      </a>
    </li>

    <li class="menu-item @if(Request::segment(1)=='department') active @endif">
      <a href="{{route('departments.index')}}" wire:navigate class="menu-link">
        <i class="menu-icon tf-icons bx bx-building"></i>
        <div data-i18n="Analytics">Departments</div>
      </a>
    </li>

    <li class="menu-item @if(Request::segment(1)=='supervisor') active @endif">
      <a href="{{route('supervisors.index')}}" wire:navigate class="menu-link">
        <i class="menu-icon tf-icons bx bx-user-circle"></i>
        <div data-i18n="Analytics">Supervisor</div>
      </a>
    </li>

    <li class="menu-item @if(Request::segment(1)=='team' && Request::segment(3)=='') active @endif">
      <a href="{{route('teams.index')}}" wire:navigate class="menu-link">
        <i class="menu-icon tf-icons bx bxl-microsoft-teams"></i>
        <div data-i18n="Analytics">Team Management</div>
      </a>
    </li>

    <li class="menu-item @if(Request::segment(1)=='assign_supervisor' || Request::segment(1)=='team' && Request::segment(3)=='assign') active @endif">
      <a href="{{route('assign_supervisor.index')}}" wire:navigate class="menu-link">
        <i class="menu-icon tf-icons bx bx-list-plus"></i>
        <div data-i18n="Analytics">Assign Supervisor</div>
      </a>
    </li>

  </ul>
</aside>