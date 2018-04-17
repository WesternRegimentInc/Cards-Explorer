<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>
                <li> <a href="#"><i class="fa fa-tachometer"></i>Dashboard</a></li>
                <li class="nav-label">Others</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-credit-card"></i><span class="hide-menu">Cards </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.cards') }}">View Cards</a></li>
                        <li><a href="{{ route('admin.cards.category') }}">Card Category</a></li>
                        <li><a href="{{ route('admin.card.to.category') }}">Card To Category</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Users</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.list') }}">View Admin</a></li>
                        <li><a href="#">View User</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>