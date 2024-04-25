<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BookController extends Controller
{

    public function index()
    {
        return Book::all();
    }

    public function getBook($id)
    {
        return Book::find($id);
    }

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
