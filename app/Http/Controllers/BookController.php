<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Books_out;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
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
        return view('/adminbuku', ['title'=>'CRUD','books'=>$books]);
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
        $validated = $request->validate([
            'title' => 'required|max:45',
            'author' => 'required|max:45',
            'isbn' => 'required|max:45',
            'publised' => 'required|numeric|digits:8',
            'status' => 'required',
        ]);
        // dd();
        // $validated['publised'] = Carbon::create($validated['publised'])->format('d-m-Y');
        // $validated['publised'] = STR::replace('-','',$validated['publised']);
        // dd($validated);
        $addBuku = Book::create($validated);
        if(!$addBuku){
            return redirect('/book')->with('error', 'Gagal menambah buku baru!');
        }
        return redirect('/book')->with('success', 'Berhasil menambah buku baru!');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $validated = $request->validate([
            'title' => 'required|max:45',
            'author' => 'required|max:45',
            'isbn' => 'required|max:45',
            'publised' => 'required|numeric|digits:8',
            'status' => 'required',
        ]);
        // dd($validated);
        $book->update($validated);
        return redirect('/book')->with('success', 'Berhasil mengedit buku!');
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $book = Book::find($id);
        if($book){
            // dd($book);
            $dipinjam = DB::table('books_outs')
                        ->join('users', 'books_outs.user_id', '=', 'users.id')
                        ->join('books', 'books_outs.book_id', '=', 'books.id')
                        ->select('users.username', 'books.*', 'books_outs.*')
                        // ->where('user_id', '!=', null)
                        ->where('book_id', '=', $id)
                        // ->where('books_outs.id', '=', $id)
                        ->where('books.status', '=', 'terpinjam')
                        ->first();
            // dd($dipinjam->status);
            if($dipinjam){
                if($dipinjam->status == "terpinjam"){
                    return redirect('/book')->with('error', 'Gagal menghapus data buku, karena buku masih di pinjam!');
                }else{
                    $dipinjam->delete();
                }
            }
            $book->delete();
        }
        return redirect('/book')->with('success', 'Berhasil menghapus data buku!');
    }

    
}
