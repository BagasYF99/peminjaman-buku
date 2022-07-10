<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Books_out;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjams = DB::table('books_outs')
                        ->join('users', 'books_outs.user_id', '=', 'users.id')
                        ->join('books', 'books_outs.book_id', '=', 'books.id')
                        ->select('users.username', 'books.*', 'books_outs.*')
                        ->where('user_id', '!=', null)
                        ->where('book_id', '!=', null)
                        ->where('books.status', '=', 'terpinjam')
                        ->get();
        // dd($peminjams);
        return view('/indexpengembalian', ['title'=>'pengembalianBuku', 'peminjams'=>$peminjams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dateOut = $request->date_out;
        // dd($dateOut);
        $peminjam = DB::table('books_outs')
                        ->join('users', 'books_outs.user_id', '=', 'users.id')
                        ->join('books', 'books_outs.book_id', '=', 'books.id')
                        ->select('users.username', 'books.*', 'books_outs.*')
                        // ->where('user_id', '!=', null)
                        // ->where('book_id', '!=', null)
                        ->where('books_outs.id', '=', $id)
                        // ->where('books.status', '=', 'terpinjam')
                        ->get();
        // dd($peminjam);
        $validated = $request->validate([
            'date_in' => 'required|after_or_equal:'.$dateOut,
        ]);
        $data = Books_out::find($id);
        // $data->date_in = $validated['date_in'];
        $data->date_in = $validated['date_in'];
        $data->save();
        if($data){
            $statusBuku = Book::find($peminjam[0]->book_id);
            $statusBuku->status = 'tidak terpinjam';
            $statusBuku->save();
            if($statusBuku){
                return redirect('/terpinjam')->with('success', 'Berhasil mengembalikan buku '.$data->title.' pada tanggal '.$data->data_in_actual);
            }else{
                return error(500);
            }
        }else{
            return error(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
