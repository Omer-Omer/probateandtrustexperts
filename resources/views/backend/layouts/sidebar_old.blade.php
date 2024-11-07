 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="@if(Route::CurrentRouteName() == 'dashboard') active @endif">
            <a href="{{ route('dashboard') }}">
                <i class="fa fa-dashboard"></i>  <span>Dashboard</span>
            </a>
        </li>

        {{-- <li class="@if(Route::CurrentRouteName() == 'product.index') active @endif">
            <a href="{{ route('product.index') }}">
                <i class="fa fa-dashboard"></i>  <span>Product</span>
            </a>
        </li> --}}

        {{-- Product --}}
        <li class="@if(Route::CurrentRouteName() == 'product.categories.show' || Route::CurrentRouteName() == 'product.subcategory.create' || Route::CurrentRouteName() == 'product.subcategory.edit'
            || Route::CurrentRouteName() == 'product.subcategories.show' || Route::CurrentRouteName() == 'product.subcategory.create' || Route::CurrentRouteName() == 'product.subcategory.edit'
            || Route::CurrentRouteName() == 'product.index' || Route::CurrentRouteName() == 'product.create' || Route::CurrentRouteName() == 'product.edit')
            ) active @endif treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Products</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="@if(Route::CurrentRouteName() == 'product.categories.show'  || Route::CurrentRouteName() == 'product.category.create' || Route::CurrentRouteName() == 'product.category.edit') active @endif"><a href="{{ route('product.categories.show') }}">Category</a></li>
                <li class="@if(Route::CurrentRouteName() == 'product.subcategories.show'  || Route::CurrentRouteName() == 'product.subcategory.create' || Route::CurrentRouteName() == 'product.subcategory.edit') active @endif"><a href="{{ route('product.subcategories.show') }}">Sub Category</a></li>

                <li class="@if(Route::CurrentRouteName() == 'product.index') active @endif"><a href="{{ route('product.index') }}">Products</a></li>
                {{-- <li class="@if(Route::CurrentRouteName() == 'product.index') active @endif"><a href="{{ route('product.index') }}">Products</a></li> --}}
            </ul>
        </li>

        {{-- <li class="@if(Route::CurrentRouteName() == 'admin.blog.view') active @endif">
            <a href="{{ route('admin.blog.view') }}">
                <i class="fa fa-dashboard"></i>  <span>Blog</span>
            </a>
        </li> --}}


        <li class="">
            <a href="">
                <i class="fa fa-dashboard"></i>  <span>Header</span>
            </a>
        </li>
        <li class="">
            <a href="">
                <i class="fa fa-dashboard"></i>  <span>Footer</span>
            </a>
        </li>
        <li class="">
            <a href="">
                <i class="fa fa-dashboard"></i>  <span>Settings</span>
            </a>
        </li>



        {{-- <li class="@if(Route::CurrentRouteName() == 'home') active @endif">
            <a href="{{ route('home') }}">
                <i class="fa fa-dashboard"></i>  <span>Home</span>
            </a>
        </li>

        <li class="@if(Route::CurrentRouteName() == 'admin.about-us.index') active @endif">
            <a href="{{ route('admin.about-us.index') }}">
                <i class="fa fa-dashboard"></i>  <span>About Us</span>
            </a>
        </li> --}}

{{--        <li class="@if(Route::CurrentRouteName() == 'admin.term-of-use.index') active @endif">--}}
{{--            <a href="{{ route('admin.term-of-use.index') }}">--}}
{{--                <i class="fa fa-dashboard"></i>  <span>Term Of Use</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="@if(Route::CurrentRouteName() == 'admin.privacy-policy.index') active @endif">--}}
{{--            <a href="{{ route('admin.privacy-policy.index') }}">--}}
{{--                <i class="fa fa-dashboard"></i>  <span>Privacy Policy</span>--}}
{{--            </a>--}}
{{--        </li>--}}

        {{-- Feedback --}}
{{--        <li class="@if(Route::CurrentRouteName() == 'admin.feedback.index' || Route::CurrentRouteName() == 'admin.feedback.review-list') active @endif treeview">--}}
{{--          <a href="#">--}}
{{--            <i class="fa fa-dashboard"></i> <span>Feedback</span>--}}
{{--            <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--          </a>--}}
{{--          <ul class="treeview-menu">--}}
{{--            <li class="@if(Route::CurrentRouteName() == 'admin.feedback.index') active @endif"><a href="{{ route('admin.feedback.index') }}">Feeddback Page</a></li>--}}
{{--            <li class="@if(Route::CurrentRouteName() == 'admin.feedback.review-list') active @endif"><a href="{{ route('admin.feedback.review-list') }}">Review List</a></li>--}}
{{--            --}}{{-- <li><a href="">Review List</a></li > --}}
{{--          </ul>--}}
{{--        </li>--}}

        {{-- Contact Us --}}
        {{-- <li class="@if(Route::CurrentRouteName() == 'admin.contact-us.index' || Route::CurrentRouteName() == 'admin.contact-us.add' || Route::CurrentRouteName() == 'admin.contact-us.edit' || Route::CurrentRouteName() == 'admin.contact-us.form-list') active @endif treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Contact Us</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if(Route::CurrentRouteName() == 'admin.contact-us.index'  || Route::CurrentRouteName() == 'admin.contact-us.add' || Route::CurrentRouteName() == 'admin.contact-us.edit') active @endif"><a href="{{ route('admin.contact-us.index') }}">Contact Us Page</a></li>
            <li class="@if(Route::CurrentRouteName() == 'admin.contact-us.form-list') active @endif"><a href="{{ route('admin.contact-us.form-list') }}">Contact Form List</a></li>
          </ul>
        </li> --}}

        {{-- Faq --}}
        {{-- <li class="@if(Route::CurrentRouteName() == 'admin.faq.index' || Route::CurrentRouteName() == 'admin.faq.add' || Route::CurrentRouteName() == 'admin.faq.edit' || Route::CurrentRouteName() == 'admin.faq.form-list') active @endif treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Faq</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if(Route::CurrentRouteName() == 'admin.faq.index'  || Route::CurrentRouteName() == 'admin.faq.add' || Route::CurrentRouteName() == 'admin.faq.edit' || Route::CurrentRouteName() == 'admin.faq.detail-section' || Route::CurrentRouteName() == 'admin.faq.have-question-list') active @endif"><a href="{{ route('admin.faq.index') }}">Q/A Section</a></li>
            <li class="@if(Route::CurrentRouteName() == 'admin.faq.detail-section') active @endif"><a href="{{ route('admin.faq.detail-section') }}">Detail Section</a></li>
            <li class="@if(Route::CurrentRouteName() == 'admin.faq.have-question-list') active @endif"><a href="{{ route('admin.faq.have-question-list') }}">Question Form List</a></li>
          </ul>
        </li>

        <li class="@if(Route::CurrentRouteName() == 'header.index') active @endif">
            <a href="{{ route('header.index') }}">
                <i class="fa fa-dashboard"></i>  <span>Header</span>
            </a>
        </li>

        <li class="@if(Route::CurrentRouteName() == 'footer.index') active @endif">
            <a href="{{ route('footer.index') }}">
                <i class="fa fa-dashboard"></i>  <span>Footer</span>
            </a>
        </li> --}}


        {{-- <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>About Us</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href=""> Dashboard v1</a></li>
            <li><a href=""> Dashboard v2</a></li>
          </ul>
        </li> --}}

        {{-- <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Frontend</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=""><a href=""> Company </a></li>
              <li><a href=""> Product Category </a></li>
            </ul>
        </li> --}}

        {{-- <li class="treeview @if(Route::CurrentRouteName() == 'view-companies') active @endif">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Settings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if(Route::CurrentRouteName() == 'view-users') active @endif"><a href="{{ route('view-users') }}"> User </a></li> --}}
{{--              <li class="@if(Route::CurrentRouteName() == 'view-companies') active @endif"><a href="{{ route('view-companies') }}"> Company </a></li>--}}
{{--              <li class="@if(Route::CurrentRouteName() == 'admin.company-contact-list') active @endif"><a href="{{ route('admin.company-contact-list') }}"> Company Contact List </a></li>--}}

{{--              <li class="@if(Route::CurrentRouteName() == 'view-product-categories') active @endif"><a href="{{ route('view-product-categories') }}"> Product Category </a></li>--}}
{{--              <li><a href="">  </a></li>--}}
            {{-- </ul>
        </li> --}}

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
