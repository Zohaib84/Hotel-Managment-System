<header class="header bg-dark text-white">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <!-- Search Panel -->
            <div class="search-panel">
                <div class="search-inner d-flex align-items-center justify-content-center">
                    <div class="close-btn"><i class="fa fa-close"></i> Close</div>
                    <form id="searchForm" action="#" class="d-flex">
                        <input type="search" name="search" placeholder="What are you searching for..." class="form-control">
                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                    </form>
                </div>
            </div>
            <!-- Navbar Header -->
            <div class="navbar-header d-flex align-items-center">
                <a href="index.html" class="navbar-brand d-flex align-items-center">
                    <div class="brand-text brand-big visible text-uppercase">
                        <strong class="text-primary">Dark</strong><strong>Admin</strong>
                    </div>
                    <div class="brand-text brand-sm">
                        <strong class="text-primary">D</strong><strong>A</strong>
                    </div>
                </a>
                <button class="sidebar-toggle btn btn-outline-light ml-3">
                    <i class="fa fa-long-arrow-left"></i>
                </button>
            </div>
            <!-- Right Menu -->
            <div class="right-menu list-inline no-margin-bottom d-flex align-items-center">
                <!-- Search Icon -->
                <div class="list-inline-item">
                    <a href="#" class="search-open nav-link text-white"><i class="icon-magnifying-glass-browser"></i></a>
                </div>
                <!-- Messages Dropdown -->
                <div class="list-inline-item dropdown">
                    <a id="navbarDropdownMenuLink1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link text-white">
                        <i class="icon-email"></i>
                        <span class="badge badge-danger">5</span>
                    </a>
                    <div aria-labelledby="navbarDropdownMenuLink1" class="dropdown-menu dropdown-menu-right">
                        <!-- Message Items -->
                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <img src="admin/img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle mr-2" style="width: 40px;">
                            <div class="content">
                                <strong class="d-block">Nadia Halsey</strong>
                                <span class="d-block">lorem ipsum dolor sit amet</span>
                                <small class="date d-block">9:30am</small>
                            </div>
                        </a>
                        <!-- More Messages -->
                        <a href="#" class="dropdown-item text-center"><strong>See All Messages <i class="fa fa-angle-right"></i></strong></a>
                    </div>
                </div>
                <!-- Tasks Dropdown -->
                <div class="list-inline-item dropdown">
                    <a id="navbarDropdownMenuLink2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link text-white">
                        <i class="icon-new-file"></i>
                        <span class="badge badge-warning">9</span>
                    </a>
                    <div aria-labelledby="navbarDropdownMenuLink2" class="dropdown-menu dropdown-menu-right">
                        <!-- Task Items -->
                        <a href="#" class="dropdown-item">
                            <div class="text d-flex justify-content-between"><strong>Task 1</strong><span>40% complete</span></div>
                            <div class="progress">
                                <div role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-info"></div>
                            </div>
                        </a>
                        <!-- More Tasks -->
                        <a href="#" class="dropdown-item text-center"><strong>See All Tasks <i class="fa fa-angle-right"></i></strong></a>
                    </div>
                </div>
                <!-- Mega Menu -->
                <div class="list-inline-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link text-white">Mega <i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-lg">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <strong class="text-uppercase">Elements Heading</strong>
                                <ul class="list-unstyled">
                                    <li><a href="#">Lorem ipsum dolor</a></li>
                                    <li><a href="#">Sed ut perspiciatis</a></li>
                                    <li><a href="#">Voluptatum deleniti</a></li>
                                </ul>
                            </div>
                            <!-- More Columns -->
                        </div>
                        <div class="row text-center mt-3">
                            <div class="col-lg-2 col-md-4">
                                <a href="#" class="d-block btn btn-primary">Demo 1</a>
                            </div>
                            <!-- More Demo Buttons -->
                        </div>
                    </div>
                </div>
                <!-- Logout Button -->
                <!-- Logout Form -->
<div class="logout-container">
    <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf
        <button type="submit" class="logout-button" @click.prevent="$root.submit();">
            <i class="fa fa-sign-out-alt"></i> {{ __('Log Out') }}
        </button>
    </form>
</div>

            </div>
        </div>
    </nav>
</header>
