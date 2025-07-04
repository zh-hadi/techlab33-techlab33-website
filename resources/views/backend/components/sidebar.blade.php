<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                    <img style="width: 50px; height: 50px;" src="{{ asset('assets/backend/img/TechLab33-logo-Round-org.jpg') }}"/>
                </div>
                <div class="sidebar-brand-text mx-3">
                    <img style="height: 80px !important;" src="{{ asset('assets/backend/img/TL33-logo-PNG-black.png') }}"/>
                <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{  route("dashboard") }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

             <li class="nav-item active">
                <a class="nav-link" href="{{ route('contacts.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Contact List</span></a>
            </li>

             <li class="nav-item active">
                <a class="nav-link" href="{{ route('features.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Feature Manage</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>NewsLater</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                        <a class="collapse-item" href="{{  route('subscribes.index') }}">Subscriber List</a>
                        <a class="collapse-item" href="{{  route('newslaters.index') }}">Send Mail</a>
                    </div>
                </div>
            </li>

             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#aboutpage"
                    aria-expanded="true" aria-controls="aboutpage">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>About Page</span>
                </a>
                <div id="aboutpage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="{{  route('abouts.index') }}">About US Manage</a>
                        <a class="collapse-item" href="{{ route('business-partners.index') }}">Client List Manage</a>
                        <a class="collapse-item" href="{{  route('testimonials.index') }}">Testimonials Manage</a>
                        <a class="collapse-item" href="{{  route('skills.index') }}">Skills Manage</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blogspage"
                    aria-expanded="true" aria-controls="blogspage">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Blogs Page</span>
                </a>
                <div id="blogspage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="{{  route('posts.index') }}">Post Manage</a>
                        <a class="collapse-item" href="{{ route('categories.index') }}">Category Manage</a>
                        <a class="collapse-item" href="{{  route('tags.index') }}">Tags Manage</a>
                      
                    </div>
                </div>
            </li>

             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#projectpage"
                    aria-expanded="true" aria-controls="projectpage">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Project Content</span>
                </a>
                <div id="projectpage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                        <a class="collapse-item" href="{{  route('projects.index') }}">Project  Manage</a>
                        <a class="collapse-item" href="{{ route('project-category.index') }}">Project Category Manage</a>
                      
                    </div>
                </div>
            </li>

             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#servicespage"
                    aria-expanded="true" aria-controls="servicespage">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Services Content</span>
                </a>
                <div id="servicespage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                        <a class="collapse-item" href="{{  route('services.index') }}">Service Manage</a>
                      
                    </div>
                </div>
            </li>

         
           
            <!-- Nav Item - Tables -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
           

        </ul>
        <!-- End of Sidebar -->