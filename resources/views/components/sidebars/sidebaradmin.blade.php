
<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Hallo, Admin {{Auth::user()->username}}</h3>
    </div>

    <ul class="list-unstyled components">
        <p>Peminjaman Buku</p>
        <!-- <li class="{{ ($title === 'dashboard') ? 'active' : ''}}">
            <a href="/dashboard">Dashboard</a>
        </li> -->
        <li class="{{ ($title === 'peminjamanBuku') ? 'active' : ''}}">
            <a href="#bookSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Buku</a>
            <ul class="collapse list-unstyled" id="bookSubmenu">
                <li>
                    <a href="/index">Peminjaman Buku</a>
                </li>
                <li>
                    <a href="/terpinjam">Pengembalian Buku</a>
                </li>
            </ul>
        </li>
        <li class="{{ ($title === 'report') ? 'active' : ''}}">
            <a href="#reportSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Report</a>
            <ul class="collapse list-unstyled" id="reportSubmenu">
                <li>
                    <a href="/user/peminjam">Daftar Peminjam Buku</a>
                </li>
                <li>
                    <a href="/buku/semua">Semua Buku</a>
                </li>
            </ul>
        </li>
        <li class="{{ ($title === 'crud') ? 'active' : ''}}">
            <a href="#crudSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">CRUD</a>
            <ul class="collapse list-unstyled" id="crudSubmenu">
                <li>
                    <a href="/book">Buku</a>
                </li>
                <li>
                    <a href="/user">User/Admin</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/logout">Logout</a>
        </li>
    </ul>
</nav>