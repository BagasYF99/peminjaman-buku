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
      @foreach($books as $book)
      <!-- Modal create Buku-->
    <div class="modal fade" id="createBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">create Buku</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" action="/buku/store">
                @csrf
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Judul Buku:</label>
                <input type="text" class="form-control" name="title" required id="recipient-name">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Pengarang-text" class="col-form-label">Pengarang:</label>
                <input type="text" class="form-control" name="author" required id="Pengarang-text">
                @error('author')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Isbn-text" class="col-form-label">Isbn:</label>
                <input type="text" class="form-control" name="isbn" required id="Isbn-text">
                @error('isbn')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="publised-text" class="col-form-label">Publised:</label>
                <input type="number" class="form-control" name="publised" required id="publised-text">
                @error('publised')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-check">
                <label class="form-check-label">Status:</label>
                <br>
                <input class="form-check-input" type="radio" name="status" id="status1" value="terpinjam">
                <label class="form-check-label" for="status1">
                    terpinjam
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status2" checked value="tidak terpinjam">
                <label class="form-check-label" for="status2">
                    tidak terpinjam
                </label>
                @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Add Buku</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>
      <!-- Modal create Buku end-->

      <!-- Modal edit Buku-->
    <div class="modal fade" id="editBuku-{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Buku</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" action="/buku/edit/{{$book->id}}">
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
                <label for="publised-text" class="col-form-label">Publised:</label>
                <input type="text" class="form-control" name="publised" required value="{{$book->publised}}" id="publised-text">
                @error('publised')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            @if($book->status == 'terpinjam')
            <div class="form-check">
                <label class="form-check-label">Status:</label>
                <br>
                <input class="form-check-input" type="radio" name="status" id="status1" value="{{$book->status}}" checked>
                <label class="form-check-label" for="status1">
                    terpinjam
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status2" value="{{$book->status}}">
                <label class="form-check-label" for="status2">
                    tidak terpinjam
                </label>
                @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            @elseif($book->status == 'tidak terpinjam')
            <div class="form-check">
                <label class="form-check-label">Status:</label>
                <br>
                <input class="form-check-input" type="radio" name="status" id="status1" value="{{$book->status}}">
                <label class="form-check-label" for="status1">
                    terpinjam
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status2" value="{{$book->status}}" checked>
                <label class="form-check-label" for="status2">
                    tidak terpinjam
                </label>
                @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            @endif
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Add Buku</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal edit Buku End-->
    @endforeach
    <div class="wrapper">
        @auth
            @if(Auth::user()->role != 'admin')
                <!-- Sidebar  -->
                @include('components.sidebars.sidebar')
            @else
                <!-- Sidebar  -->
                @include('components.sidebars.sidebaradmin', ['title'=>$title])
                
                <!-- Page Content  -->

                @include('components.contents.admin.crud.crudbuku', ['books'=>$books])
                
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