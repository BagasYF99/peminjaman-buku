
<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Hallo, {{Auth::user()->username}}</h3>
    </div>

    <ul class="list-unstyled components">
        <p>Peminjaman Buku</p>
        <!-- <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
            </ul>
        </li> -->
        <li class="Active">
            <a href="/dashboard">Dashboard</a>
        </li>
        <!-- <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li> -->
        <!-- <li>
            <a href="/user">User</a>
        </li> -->
        <li>
            <a href="/logout">Logout</a>
        </li>
    </ul>
</nav>