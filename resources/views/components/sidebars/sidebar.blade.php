
<!-- Sidebar user -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Hallo, {{Auth::user()->username}}</h3>
    </div>

    <ul class="list-unstyled components">
        <p>Peminjaman Buku</p>
        <li class="{{ ($title === 'peminjamanBuku') ? 'active' : ''}}">
            <a href="#userBookSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Buku</a>
            <ul class="collapse list-unstyled" id="userBookSubmenu">
                <li>
                    <a href="/index">Semua Buku</a>
                </li>
                <li>
                    <a href="/terpinjam">Buku Dipinjam</a>
                </li>
            </ul>
        </li>
        <!-- <li class="Active">
            <a href="/dashboard">Dashboard</a>
        </li> -->
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