 <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
     <div class="navbar-header">
         <ul class="nav navbar-nav flex-row">
             <li class="nav-item me-auto">
                 <a class="navbar-brand" href="/">
                     <span class="brand-logo ">
                         <img src="{{ asset('admin') }}/app-assets/images/logo1.png" />
                     </span>
                     <span class="brand-text">
                         <img src="{{ asset('admin') }}/app-assets/images/logo2.png" />
                     </span>
                 </a>
             </li>
             <li class="nav-item nav-toggle">
                 <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                     <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                         class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                         data-ticon="disc"></i></a>
             </li>
         </ul>
     </div>
     <div class="shadow-bottom"></div>
     <div class="main-menu-content">
         <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
             <li class=" nav-item"><a class="d-flex align-items-center" href=""><i data-feather="home"></i><span
                         class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span> </a>
                 <ul class="menu-content">
                     <li @class([
                         'active' =>
                             request()->route()->getName() == 'home',
                     ])><a class="d-flex align-items-center" href="/"><i
                                 data-feather="circle"></i><span class="menu-item text-truncate"
                                 data-i18n="Analytics">Comments Dashboard</span></a>
                     </li>

                 </ul>
             </li>

             <li class=" nav-item"><a class="d-flex align-items-center" href=""><i
                         data-feather='settings'></i><span class="menu-title text-truncate"
                         data-i18n="Dashboards">Setup</span></a>
                 <ul class="menu-content">

                     <li class=" nav-item"><a class="d-flex align-items-center" href="#"><svg
                                 xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-mail">
                                 <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                 </path>
                                 <polyline points="22,6 12,13 2,6"></polyline>
                             </svg><span class="menu-title text-truncate" data-i18n="Email">Questions</span></a>
                     </li>
                     <li class=" nav-item"><a class="d-flex align-items-center" href="#"><svg
                                 xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-message-square">
                                 <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                             </svg><span class="menu-title text-truncate" data-i18n="Chat">Clients</span></a>
                     </li>
                     <li class=" nav-item"><a class="d-flex align-items-center" href="#"><svg
                                 xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-mail">
                                 <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                 </path>
                                 <polyline points="22,6 12,13 2,6"></polyline>
                             </svg><span class="menu-title text-truncate" data-i18n="Email">Services</span></a>
                     </li>
                     <li class=" nav-item"><a class="d-flex align-items-center" href="#"><svg
                                 xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-message-square">
                                 <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                             </svg><span class="menu-title text-truncate" data-i18n="Chat">Randomizer</span></a>
                     </li>

                 </ul>
             </li>
             {{-- <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                         data-feather="users"></i><span class="menu-title text-truncate"
                         data-i18n="Users">Users</span> </a>
                 <ul class="menu-content">
                     <li @class([
                         'active' =>
                             request()->route()->getName() == 'users.index' ||
                             request()->route()->getName() == 'users.edit',
                     ])>
                         <a class="d-flex align-items-center" href="{{ route('users.index') }}"><i
                                 data-feather="circle"></i><span class="menu-item text-truncate"
                                 data-i18n="Users">Users List</span></a>
                     </li>
                     <li @class([
                         'active' =>
                             request()->route()->getName() == 'users.create',
                     ])><a class="d-flex align-items-center"
                             href="{{ route('users.create') }}"><i data-feather="circle"></i><span
                                 class="menu-item text-truncate" data-i18n="Users">Add New User</span></a>
                     </li>

                 </ul>
             </li> --}}


         </ul>
     </div>
 </div>
