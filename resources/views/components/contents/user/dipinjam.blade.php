<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>
            <!-- 
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Page</a>
                    </li>
                </ul>
            </div> -->
        </div>
    </nav>
    <!-- alert_ -->
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
    </div>
    @endif
    <!-- alert_end -->
    <table class="table table-dark table-borderless">
        <thead>
            <tr>
                <td>NO</td>
                <td>Title</td>
                <td>Author</td>
                <td>Isbn</td>
                <td>Publised</td>
                <td>Nama Peminjam</td>
                <td>Tanggal Pinjam</td>
                <td>Tanggal Kembali Aktual</td>
                <!-- <td>Status</td> -->
                <!-- <td>Action</td> -->
            </tr>
        </thead>
        <tbody>
            @if(count($peminjams)>0)
            <?php $no = 0 ?>
            @foreach($peminjams as $peminjam)
            <?php $no++ ?>
            <tr>
                <td>{{$no}}</td>
                <td>{{$peminjam->title}}</td>
                <td>{{$peminjam->author}}</td>
                <td>{{$peminjam->isbn}}</td>
                <td>{{$peminjam->publised}}</td>
                <td>{{$peminjam->username}}</td>
                <td>{{$peminjam->date_out}}</td>
                <td>{{$peminjam->date_in_actual}}</td>
                <!-- <td>{{$peminjam->status}}</td>
                <td>
                    @if($peminjam->status == "terpinjam")
                    <button class="btn btn-primary">
                       Pengembalian Buku
                    </button>
                    @else
                    <button class="btn btn-primary">
                       Pinjam Buku
                    </button>
                    @endif
                </td> -->
                <!-- <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pengembalianBuku-{{$peminjam->id}}">
                    Kembalikan Buku
                    </button>
                </td> -->
            </tr>
            @endforeach
            @else
            <div>
                <h2>Tidak Ada Buku Yang Anda Pinjam!</h2>
            </div>
            @endif
        </tbody>
    </table>

    
