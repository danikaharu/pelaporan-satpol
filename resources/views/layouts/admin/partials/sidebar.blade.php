 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="#" class="brand-link">
         <img src="{{ asset('template/dist/img/logo.png') }}" alt="Survey" class="brand-image ">
         <span class="brand-text font-weight-light">Survey</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 @if (auth()->user()->profile->photo)
                     <img src="{{ asset('storage/upload/photos', auth()->user()->profile->photo) }}"
                         class="img-circle elevation-2" alt="User Image">
                 @else
                     <img src="{{ asset('template/dist/img/user.jpg') }}" class="img-circle elevation-2"
                         alt="User Image">
                 @endif
             </div>
             <div class="info">
                 <a href="#" class="d-block">{{ auth()->user()->name }}</a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="{{ route('dashboard.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 @can('show-survey')
                     <li class="nav-item">
                         <a href="{{ route('users.index') }}" class="nav-link">
                             <i class="nav-icon fas fa-user"></i>
                             <p>
                                 Biodata User
                             </p>
                         </a>
                     </li>
                 @endcan
                 @can('answer-survey')
                     <li class="nav-item">
                         <a href="{{ route('entries.create') }}" class="nav-link">
                             <i class="nav-icon fas fa-poll"></i>
                             <p>
                                 Kuisioner
                             </p>
                         </a>
                     </li>
                 @endcan
                 <li class="nav-item">
                     <a href="{{ route('logout') }}" class="nav-link"
                         onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                         <i class="nav-icon fas fa-door-open"></i>
                         <p>
                             Logout
                         </p>
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
