<?php use App\Models\Contact; ?>
<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="{{url('admin/dashborad')}}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('admin/users')}}" class="nav-link">
                <i class="far fa-user nav-icon"></i>
                <p>users</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('admin/categories')}}" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Categories
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('admin/medias')}}" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    media
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    pages
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">4</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('admin/abouts')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>about</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/services')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>services</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/portfolios')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Portfolio</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/blogs')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>blog</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    posts
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('admin/teams')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Teams</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/testimonials')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>testimonials</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                    sections home
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('admin/clients')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Clients</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/faqs')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>FAQ</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{url('admin/contacts')}}" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                    message
                </p>
                <span class="badge badge-warning navbar-badge">{{Contact::all()->count()}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('admin/sectionblogs')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Section To Blogs</p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->