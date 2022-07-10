<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Books_out;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::where('id', '>', 0)->get();
        if(count($books)<1){
            $books = [];
        }
        $users = User::where('id', '>', 0)->where('role', '!=', 'admin')->get();
        if(count($users)<1){
            $users = [];
        }
        // dd($users->books_outs);
        return view('indexpeminjaman', ['books'=>$books, 'users'=>$users, 'title'=>'peminjamanBuku']);
    }

    public function daftarPeminjam()
    {
        $peminjams = DB::table('books_outs')
                        ->join('users', 'books_outs.user_id', '=', 'users.id')
                        ->join('books', 'books_outs.book_id', '=', 'books.id')
                        ->select('users.username', 'books.*', 'books_outs.*')
                        ->where('user_id', '!=', null)
                        ->where('book_id', '!=', null)
                        // ->where('books.status', '=', 'terpinjam')
                        ->get();
        // dd($peminjams);
        // $denda = 
        foreach($peminjams as $peminjam){
            if($peminjam->date_in != null){
                $dateIn = Carbon::parse($peminjam->date_in);
                $dateInActual = Carbon::parse($peminjam->date_in_actual);
                $selisih = $dateInActual->diffInDays($dateIn, false);
                // dd($peminjam->date_in < $peminjam->date_in_actual);
                if($peminjam->date_in <= $peminjam->date_in_actual){
                    // dd('tidak denda');
                    // dd($selisih);
                    $dendas[] = [
                        'id'=>$peminjam->id, 
                        'denda'=> "Tidak ada denda"
                    ];
                }else{
                    $dendas[] = [
                        'id'=>$peminjam->id, 
                        'denda'=> $selisih*2000
                    ];
                }
            }else{
                $dendas[] = [
                    'id'=>$peminjam->id, 
                    'denda'=> "Tidak ada denda"
                ];
            }
        }
        // dd($dendas);
        // foreach($dendas as $denda){
        //     dd($denda['id']);
        // }

        // dd($selisih);
        return view('/indexdaftarpeminjam', ['title'=>'pengembalianBuku', 'peminjams'=>$peminjams, 'dendas'=>$dendas]);
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
        //
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
    //pinjam buku
    public function bookOut(Request $request, $id)
    {
        $today = Carbon::now()->format('Y-m-d');
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'user_id' => 'required',
            'date_out' => 'required|after_or_equal:'.$today,
            'date_in_actual' => 'required',
        ]);
        $user = User::where('id', '=', $validated['user_id'])->first();
        $book = Book::where('id', '=', $id)->first();
        // if($validated['user_id']){
        //     $peminjam = Books_out::where('user_id', '=', $validated['user_id'])->where('book_id', '=', $id)->first();
        //     if($peminjam){
        //         return redirect('/index')->with('error', $user->username.' sudah meminjam buku ini, dengan tanggal pengembalian actual '. $peminjam->date_in_actual);
        //     }
        // }
        // if($book){
        //     if($book->status ==)
        // }
        if($book->status == "terpinjam"){
            return redirect('/index')->with('error', 'Maaf buku '.$book->title.' sedang di pinjam!');
        }
        // $validated = Arr::add($validated, 'date_in', Carbon::create($validated['date_out'])->addDays(7), 'book_id', $id);
        $validated = Arr::add($validated, 'date_in', null);
        $validated = Arr::add($validated, 'book_id', $id);
        // $validated['date_in'] = $validated['date_in']->format('Y-m-d');
        $bookOut = Books_out::create($validated);
        if(!$bookOut){
            return redirect()->with('error', 'Gagal meminjam buku!');
        }
        $book->status = 'terpinjam';
        $book->save();
        return redirect('/index')->with('success', 'Buku berhasil di pinjam oleh '.$user->username);
    }
}
