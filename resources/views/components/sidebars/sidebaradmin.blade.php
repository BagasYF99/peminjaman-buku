
<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Hallo, Admin {{Auth::user()->username}}</h3>
    </div>

    <ul class="list-unstyled components">
        <p>Peminjaman Buku</p>
        <li class="{{ ($title === 'dashboard') ? 'active' : ''}}">
            <a href="/dashboard">Dashboard</a>
        </li>
        <li class="{{ ($title === 'dipinjam') ? 'active' : ''}}">
            <a href="/dipinjam">dipinjam</a>
        </li>
        <li>
            <a href="/logout">Logout</a>
        </li>
    </ul>
</nav>