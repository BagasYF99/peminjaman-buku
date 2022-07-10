<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{$title}}</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <!-- <link rel="stylesheet" href="style.css"> -->

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
    <!-- Sidebar CSS_ -->
    <link rel="stylesheet" href="{{asset('css/sidebar/style.css')}}">

    
  </head>
  <body>

<!-- Modal Pinjam Buku-->
@foreach($books as $book)
    <div class="modal fade" id="pinjamBuku-{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pinjam Buku</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" action="/pinjam/buku/{{$book->id}}">
                @csrf
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Judul Buku:</label>
                <input type="text" class="form-control" name="title" required value="{{$book->title}}" id="recipient-name">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Pengarang-text" class="col-form-label">Pengarang:</label>
                <input type="text" class="form-control" name="author" required value="{{$book->author}}" id="Pengarang-text">
                @error('author')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Isbn-text" class="col-form-label">Isbn:</label>
                <input type="text" class="form-control" name="isbn" required value="{{$book->isbn}}" id="Isbn-text">
                @error('isbn')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Nama peminjam-text" class="col-form-label">Nama peminjam:</label>
                <select class="custom-select" name="user_id" required>
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->username}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Tanggal pinjam-text" class="col-form-label">Tanggal pinjam:</label>
                <input type="date" class="form-control" id="Tanggal pinjam-text" name="date_out" required>
                @error('date_out')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Tanggal kembali aktual-text" class="col-form-label">Tanggal kembali aktual:</label>
                <input type="date" class="form-control" id="Tanggal kembali aktual-text" name="date_in_actual" required>
                @error('date_in_actual')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Pinjam Buku</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    @endforeach
<!-- Modal Pinjam Buku End-->

    <div class="wrapper">
        @auth
            @if(Auth::user()->role != 'admin')
                <!-- Sidebar  -->
                @include('components.sidebars.sidebar')
            @else
                <!-- Sidebar  -->
                @include('components.sidebars.sidebaradmin', ['title'=>$title])
                
                <!-- Page Content  -->
                @include('components.contents.admin.pinjambuku', ['books'=>$books])
                
            @endif
        @else
            <!-- Sidebar  -->
            @include('components.sidebars.sidebarguest', ['title'=>$title])
            
            <!-- Page Content  -->
            @include('components.contents.contentguest', ['books'=>$books])
            
        @endauth
            
            
        </div>
        <!-- Page Content end -->
    </div>
    
    <!-- Optional JavaScript -->

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!-- jQuery CDN - Slim version (=without AJAX) End-->

    <!-- jQuery CDN - min version (=with AJAX) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- jQuery CDN - min version (=with AJAX) End-->

    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
</body>
</html>