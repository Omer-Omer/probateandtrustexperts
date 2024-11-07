    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">{{ str_replace('_',' ', config('app.name')) }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <div class="image">
                        <img src="{{ asset('backend/dist/img/avatar5.png') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name ?? 'Alexander Pierce' }}</a>
                    </div>
                </div>
                <div class="pr-3" style="font-size: 12px;">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span>Sign Out</span>&nbsp;&nbsp;
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div> --}}

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->

                    {{-- START --}}
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link @if (Route::CurrentRouteName() == 'dashboard') active @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                {{-- <span class="right badge badge-danger">New</span> --}}
                            </p>
                        </a>
                    </li>

                    {{-- <li class="nav-header">Company</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.company.index') }}"
                            class="nav-link @if (Route::CurrentRouteName() == 'admin.company.index' ||
                                    Route::CurrentRouteName() == 'admin.company.create' ||
                                    Route::CurrentRouteName() == 'admin.company.edit') active @endif">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <span class="text-inside-circle">C</span>
                            <p>
                                Company
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li> --}}

                    <li class="nav-header">PRODUCTS</li>
                    <li class="nav-item">
                        <a href="{{ route('product.categories.show') }}"
                            class="nav-link @if (Route::CurrentRouteName() == 'product.categories.show' ||
                                    Route::CurrentRouteName() == 'product.category.create' ||
                                    Route::CurrentRouteName() == 'product.category.edit') active @endif">
                            {{-- <i class="nav-icon fab fa-product-hunt"></i> --}}
                            <span class="text-inside-circle">C</span>
                            <p>
                                Category
                                {{-- <span class="right badge badge-danger">New</span> --}}
                            </p>
                        </a>
                    </li>

                    {{-- menu-is-opening menu-open --}}
                    <li class="nav-header">FRONTEND - PAGES</li>
                    <li class="nav-item @if (Route::CurrentRouteName() == 'topbar' || Route::CurrentRouteName() == 'footer' || Route::CurrentRouteName() == 'banner' || Route::CurrentRouteName() == 'textUnderBanner' || Route::CurrentRouteName() == 'admin.company.index' || Route::CurrentRouteName() == 'admin.company.create' || Route::CurrentRouteName() == 'admin.company.edit' || Route::CurrentRouteName() == 'product.index' || Route::CurrentRouteName() == 'product.create' || Route::CurrentRouteName() == 'product.edit' ||Route::CurrentRouteName() == 'admin.portfolio.index' || Route::CurrentRouteName() == 'admin.portfolio.create' || Route::CurrentRouteName() == 'admin.portfolio.edit') menu-is-opening menu-open @endif">

                        <a href="#" class="nav-link @if (Route::CurrentRouteName() == 'topbar' || Route::CurrentRouteName() == 'footer' || Route::CurrentRouteName() == 'banner' || Route::CurrentRouteName() == 'textUnderBanner' || Route::CurrentRouteName() == 'admin.company.index' || Route::CurrentRouteName() == 'admin.company.create' || Route::CurrentRouteName() == 'admin.company.edit' || Route::CurrentRouteName() == 'product.index' || Route::CurrentRouteName() == 'product.create' || Route::CurrentRouteName() == 'product.edit' || Route::CurrentRouteName() == 'admin.portfolio.index' || Route::CurrentRouteName() == 'admin.portfolio.create' || Route::CurrentRouteName() == 'admin.portfolio.edit'  || Route::CurrentRouteName() == 'page.fabric') active @endif">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Home Page
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: @if(Route::CurrentRouteName() == 'topbar' || Route::CurrentRouteName() == 'footer' || Route::CurrentRouteName() == 'banner' || Route::CurrentRouteName() == 'textUnderBanner' || Route::CurrentRouteName() == 'admin.company.index' || Route::CurrentRouteName() == 'admin.company.create' || Route::CurrentRouteName() == 'admin.company.edit' || Route::CurrentRouteName() == 'product.index' || Route::CurrentRouteName() == 'product.create' || Route::CurrentRouteName() == 'product.edit' || Route::CurrentRouteName() == 'admin.portfolio.index' || Route::CurrentRouteName() == 'admin.portfolio.create' || Route::CurrentRouteName() == 'admin.portfolio.edit' || Route::CurrentRouteName() == 'page.fabric') block; @else none; @endif;">
                            <li class="nav-item">
                                <a href="{{ route('topbar') }}" class="nav-link @if (Route::CurrentRouteName() == 'topbar') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Top Tabs</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('banner') }}" class="nav-link @if (Route::CurrentRouteName() == 'banner') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Banner</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('page.fabric') }}"
                                    class="nav-link @if (Route::CurrentRouteName() == 'page.fabric') active @endif">
                                     {{-- <i class="nav-icon fas fa-headset"></i> --}}
                                    <span class="text-inside-circle">I</span>
                                    <p>
                                        Home Fabric Images
                                        {{-- <span class="right badge badge-danger">New</span> --}}
                                    </p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('textUnderBanner') }}" class="nav-link @if (Route::CurrentRouteName() == 'textUnderBanner') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Text under the banner</p>
                                </a>
                            </li> --}}

                            {{-- <li class="nav-item">
                                <a href="{{ route('admin.company.index') }}"
                                    class="nav-link @if (Route::CurrentRouteName() == 'admin.company.index' ||
                                            Route::CurrentRouteName() == 'admin.company.create' ||
                                            Route::CurrentRouteName() == 'admin.company.edit') active @endif">
                                    <i class="nav-icon fab fa-product-hunt"></i>
                                    <span class="text-inside-circle">C</span>
                                    <p>
                                        Company
                                        <span class="right badge badge-danger">New</span>
                                    </p>
                                </a>
                            </li> --}}


                            <li class="nav-item">
                                <a href="{{ route('product.index') }}"
                                    class="nav-link @if (Route::CurrentRouteName() == 'product.index' ||
                                            Route::CurrentRouteName() == 'product.create' ||
                                            Route::CurrentRouteName() == 'product.edit') active @endif">
                                    <i class="nav-icon fab fa-product-hunt"></i>
                                    <p>
                                        Products
                                        <span class="right badge badge-danger">New</span>
                                    </p>
                                </a>
                            </li>

                            {{-- <li class="nav-item">
                                <a href="{{ route('admin.portfolio.index') }}"
                                    class="nav-link @if (Route::CurrentRouteName() == 'admin.portfolio.index' ||
                                            Route::CurrentRouteName() == 'admin.portfolio.create' ||
                                            Route::CurrentRouteName() == 'admin.portfolio.edit') active @endif">
                                    <i class="nav-icon fab fa-product-hunt"></i>
                                    <p>
                                        Portfolio
                                        <span class="right badge badge-danger">New</span>
                                    </p>
                                </a>
                            </li> --}}

                            <li class="nav-item">
                                <a href="{{ route('footer') }}" class="nav-link @if (Route::CurrentRouteName() == 'footer') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Footer</p>
                                </a>
                            </li>


                        </ul>
                    </li>

                    {{-- <li class="nav-item">
                        <a href="{{ route('home.index') }}"
                            class="nav-link @if (Route::CurrentRouteName() == 'home.index') active @endif">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Home
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li> --}}

                   <li class="nav-item">
                       <a href="{{ route('custom-drapery') }}"
                           class="nav-link @if (Route::CurrentRouteName() == 'custom-drapery') active @endif">
                            {{-- <i class="nav-icon fas fa-headset"></i> --}}
                           <span class="text-inside-circle">C</span>
                           <p>
                               Custom Drapery
                                {{-- <span class="right badge badge-danger">New</span> --}}
                           </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('page.gallery') }}"
                           class="nav-link @if (Route::CurrentRouteName() == 'page.gallery') active @endif">
                            {{-- <i class="nav-icon fas fa-headset"></i> --}}
                           <span class="text-inside-circle">I</span>
                           <p>
                               Custom Drapery Images
                                {{-- <span class="right badge badge-danger">New</span> --}}
                           </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('page.projects') }}"
                           class="nav-link @if (Route::CurrentRouteName() == 'page.projects') active @endif">
                            {{-- <i class="nav-icon fas fa-headset"></i> --}}
                           <span class="text-inside-circle">P</span>
                           <p>
                               Projects Images
                                {{-- <span class="right badge badge-danger">New</span> --}}
                           </p>
                       </a>
                   </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.about-us.index') }}"
                            class="nav-link @if (Route::CurrentRouteName() == 'admin.about-us.index') active @endif">
                            <span class="text-inside-circle">A</span>
                            <p>
                                About Us
                            </p>
                        </a>
                    </li>

                   {{-- <li class="nav-item">
                        <a href="{{ route('page.contactus') }}"
                            class="nav-link @if (Route::CurrentRouteName() == 'page.contactus') active @endif">
                            <span class="text-inside-circle">C</span>
                            <p>
                                Contact Us Page
                            </p>
                        </a>
                    </li> --}}

                    {{-- <li class="nav-item">
                        <a href="{{ route('page.vendor') }}"
                            class="nav-link @if (Route::CurrentRouteName() == 'page.vendor') active @endif">
                            <i class="nav-icon fas fa-headset"></i>
                            <span class="text-inside-circle">C</span>
                            <p>
                                Vendors Page
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li> --}}

                    <li class="nav-header">SETTINGS</li>
                    <li class="nav-item">
                        <a href="{{ route('configuration') }}"
                            class="nav-link @if (Route::CurrentRouteName() == 'configuration')  @endif">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                Configuration
                                {{-- <span class="right badge badge-danger">New</span> --}}
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
