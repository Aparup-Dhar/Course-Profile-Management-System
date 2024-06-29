<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="" class="text-nowrap logo-img">
            <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>

          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">

          @if(Session::has('role') && Session::get('role')=="root")
          <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
              <a class="sidebar-link" href="/root/home" aria-expanded="false">
                <span>
                <i class="ti ti-home"></i>
                </span>
                <span class="hide-menu">Home</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Departments</span>
          </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/root/create-department" aria-expanded="false">
                <span>
                  <i class="ti ti-school"></i>
                </span>
                <span class="hide-menu">Create Department</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/root/view-department" aria-expanded="false">
                <span>
                 <i class="ti ti-books"></i>
                </span>
                <span class="hide-menu">View Department</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Admins</span>
          </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/root/create-dep-admin" aria-expanded="false">
                <span>
                <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Create Admin</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/root/view-dep-admin" aria-expanded="false">
                <span>
                <i class="ti ti-user-search"></i>
                </span>
                <span class="hide-menu">View Admin</span>
              </a>
            </li>
            @endif
            @if(Session::has('role') && Session::get('role')=="dep")
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/dep-admin/home" aria-expanded="false">
                <span>
                <i class="ti ti-home"></i>
                </span>
                <span class="hide-menu">Home</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Versions</span>
          </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/dep-admin/create-version" aria-expanded="false">
                <span>
                <i class="ti ti-binary-tree-2"></i>
                </span>
                <span class="hide-menu">Create Versions</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/dep-admin/view-version" aria-expanded="false">
                <span>
                <i class="ti ti-list-search"></i>
                </span>
                <span class="hide-menu">View Versions</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Courses</span>
          </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/dep-admin/create-course" aria-expanded="false">
                <span>
                <i class="ti ti-certificate"></i>
                </span>
                <span class="hide-menu">Create Course</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/dep-admin/view-course" aria-expanded="false">
                <span>
                <i class="ti ti-file-search"></i>
                </span>
                <span class="hide-menu">View Courses</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Program Outcomes</span>
          </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/dep-admin/create-po" aria-expanded="false">
                <span>
                <i class="ti ti-album"></i>
                </span>
                <span class="hide-menu">Create PO</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/dep-admin/view-po" aria-expanded="false">
                <span>
                <i class="ti ti-files"></i>
                </span>
                <span class="hide-menu">View PO</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Create Course Profile</span>
          </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/dep-admin/create-cp" aria-expanded="false">
                <span>
                <i class="ti ti-book-2"></i>
                </span>
                <span class="hide-menu">Create CProfile</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/dep-admin/view-cp" aria-expanded="false">
                <span>
                <i class="ti ti-notebook"></i>
                </span>
                <span class="hide-menu">View CProfile</span>
              </a>
            </li>
            @endif
          </ul>
        </nav>
        
        </div>
      <!-- End Sidebar scroll-->
    </aside>