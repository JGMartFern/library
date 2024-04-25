<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreBookRequest;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Book::all();
    }

    public function getBook($id)
    {
        return Book::find($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->validated());

        return BookResource::make($book);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return BookResource::make($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['error' => 'Book not found!'], 404);
        }

        $book->update([
            'borrower' => null,
            'start_date' => null,
            'limit_date' => null
        ]);

        return response()->json(['message' => 'Book updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }

    public function takeLoan(Request $request, $id) {

        $book = Book::find($id);
        if (!$book) {
            return response()->json(['error' => 'Book not found!'], 404);
        }

        $book->update([
            'borrower' => $request->input('borrower'),
            'start_date' => $request->input('start_date'),
            'limit_date' => $request->input('limit_date')
        ]);

        return response()->json(['message' => 'Book updated!']);
    }
}
