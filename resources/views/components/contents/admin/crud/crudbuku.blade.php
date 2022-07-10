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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createBuku">
        Tambah Buku
    </button>
    <table class="table table-dark table-borderless mt-2">
        <thead>
            <tr>
                <td>NO</td>
                <td>Title</td>
                <td>Author</td>
                <td>Isbn</td>
                <td>Publised</td>
                <td>Status</td>
                <td>Action</td>
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
                <td>{{$book->status}}</td>
                <td>
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editBuku-{{$book->id}}">
                                Edit
                            </button>
                        </div>
                        <div class="col">
                            <form action="/buku/delete/{{$book->id}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('Are You Sure ? Your data will disappear!')">
                                        Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </td>
                <!-- <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pinjamBuku-{{$book->id}}">
                    Pinjam Buku
                    </button>
                </td> -->
            </tr>
            @endforeach
        </tbody>
    </table>

    
