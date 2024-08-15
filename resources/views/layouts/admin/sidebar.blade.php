<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->

        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Əsas</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="{{Request::segment(2)==='dashboard' ? 'active' : ''}}"><a href="{{route('admin.dashboard')}}"><i class="icon-home4"></i>
                            <span>Əsas Səhifə</span></a></li>
                    <li class="{{Request::segment(2)==='roles' ? 'active' : ''}}"><a href="{{ route('admin.roles.index') }}"><i class="icon-home4"></i><span>Manage Role</span></a></li>
                    <li class="{{Request::segment(2)==='products' ? 'active' : ''}}"><a href="{{ route('admin.products.index') }}"><i class="icon-home4"></i><span>Manage Product</span></a></li>
                    <li class="{{Request::segment(2)==='permissions' ? 'active' : ''}}"><a href="{{ route('admin.permissions.index') }}"><i class="icon-home4"></i><span>Manage Permissions</span></a></li>
                    <li class="{{Request::segment(2)==='usertest' ? 'active' : ''}}"><a href="{{ route('admin.test') }}"><i class="icon-home4"></i><span>Test</span></a></li>
                    <li class="ms-3 nav-item dropdown">
                    <li class="{{Request::segment(2)==='email' ? 'active' : ''}}"><a href="{{ route('admin.email') }}"><i class="icon-home4"></i><span>Email</span></a></li>
                        <!-- /main -->
                        
                        <!-- Forms -->
                        <!-- /forms -->

                        <!-- Appearance -->

                        <!-- /appearance -->

                        <!-- Layout -->

                        <!-- /layout -->

                        <!-- Data visualization -->

                        <!-- /data visualization -->

                        <!-- Extensions -->

                        <!-- /extensions -->

                        <!-- Tables -->
                        <!-- /tables -->

                        <!-- Page kits -->
                        <!-- /page kits -->

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>