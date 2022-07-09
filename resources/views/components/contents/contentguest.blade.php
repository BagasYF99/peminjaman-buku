
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
    <table class="table table-dark table-borderless">
        <thead>
            <tr>
                <td>NO</td>
                <td>Title</td>
                <td>Author</td>
                <td>Isbn</td>
                <td>Publised</td>
                <!-- <td>Status</td> -->
            </tr>
        </thead>
        <tbody>
            <?php $no = 0 ?>
            @foreach($books as $book)
            <?php $no++ ?>
            <tr>
                <td>{{$no}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->isbn}}</td>
                <td>{{$book->publised}}</td>
                <!-- <td>{{$book->status}}</td>
                <td>
                    @if($book->status == "terpinjam")
                    <button class="btn btn-primary">
                       Pengembalian Buku
                    </button>
                    @else
                    <button class="btn btn-primary">
                       Peminjaman Buku
                    </button>
                    @endif
                </td> -->
            </tr>
            @endforeach
        </tbody>
    </table>