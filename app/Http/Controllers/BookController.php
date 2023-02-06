<?php


namespace App\Http\Controllers;


use App\Models\Book;
use Illuminate\Http\Request;


class BookController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }



    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Book::create($request->all());

        return response()->json(['message' => 'Book created successfully'], 201);
    }


    public function show($bookId)
    {
        $book = Book::find($bookId);

        return response()->json($book, 201);
    }


    public function update(Request $request, $bookId)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $book = Book::find($bookId);
        $book->update($request->all());

        return response()->json(['message' => 'Book information updated successfully'], 201);

    }


    public function destroy($bookId)
    {
        $book = Book::find($bookId);
        $book->delete();

        return response()->json(['message' => 'Book information deleted successfully']);
    }
}
