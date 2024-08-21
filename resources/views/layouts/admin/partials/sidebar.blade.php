<div class="main-nav">
    <!-- Sidebar Logo -->
    <div class="logo-box">
         <a href="index.html" class="logo-dark">
              <img src="{{asset('assets/admin/images/logo-sm.png')}}" class="logo-sm" alt="logo sm">
              <img src="{{asset('assets/admin/images/logo-dark.png')}}" class="logo-lg" alt="logo dark">
         </a>

         <a href="index.html" class="logo-light">
              <img src="{{asset('assets/admin/images/logo-sm.png')}}" class="logo-sm" alt="logo sm">
              <img src="{{asset('assets/admin/images/logo-light.png')}}" class="logo-lg" alt="logo light">
         </a>
    </div>

    <!-- Menu Toggle Button (sm-hover) -->
    <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
         <iconify-icon icon="solar:double-alt-arrow-right-bold-duotone" class="button-sm-hover-icon"></iconify-icon>
    </button>

    <div class="scrollbar" data-simplebar>
         <ul class="navbar-nav" id="navbar-nav">

              <li class="menu-title">General</li>

              <li class="nav-item">
                   <a class="nav-link" href="{{route ('admin.dashboard')}}">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                        </span>
                        <span class="nav-text"> Dashboard </span>
                   </a>
              </li>

              <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarProducts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProducts">
                     <span class="nav-icon">
                          <iconify-icon icon="solar:t-shirt-bold-duotone"></iconify-icon>
                     </span>
                     <span class="nav-text"> Products </span>
                </a>
                <div class="collapse" id="sidebarProducts">
                     <ul class="nav sub-navbar-nav">
                          <li class="sub-nav-item">
                               <a class="sub-nav-link" href="{{route ('product.list')}}">List</a>
                          </li>
                          <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{route ('product.add')}}">Create</a>
                       </li>
                          <li class="sub-nav-item">
                               <a class="sub-nav-link" href="{{route ('product.size')}}">size</a>
                          </li>
                          <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{route ('product.color')}}">color</a>
                       </li>
                     </ul>
                </div>
           </li>

              <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarCategory" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCategory">
                     <span class="nav-icon">
                          <iconify-icon icon="solar:clipboard-list-bold-duotone"></iconify-icon>
                     </span>
                     <span class="nav-text"> Category </span>
                </a>
                <div class="collapse" id="sidebarCategory">
                     <ul class="nav sub-navbar-nav">
                          <li class="sub-nav-item">
                               <a class="sub-nav-link" href="{{route ('category.list')}}">List</a>
                          </li>
                          <li class="sub-nav-item">
                               <a class="sub-nav-link" href="{{route ('category.add')}}">Add</a>
                          </li>
                     </ul>
                </div>
           </li>
         </ul>
    </div>
</div>
