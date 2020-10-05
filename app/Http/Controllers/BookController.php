<?php

namespace App\Http\Controllers;

use App\Http\Requests\API\BookRequest;
use App\Http\Filters\BooksFilter;
use App\Http\Traits\Responses;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Routing\Controller as BaseController;

class BookController extends BaseController
{
    use Responses;

    /**
     * Store books in database
     * @param Book $book
     * @param BookRequest $request
     * @return BookController|object
     */
    public function store(Book $book, BookRequest $request)
    {

        if(!$author = Author::where('author', $request->get('author'))->first()){
            $author = Author::create([
                'author' => $request->get('author')
            ]);
        }

        if(!$category = Category::where('category', $request->get('category'))->first()) {
            $category = Category::create([
                'category' => $request->get('category')
            ]);
        }
        $book = $book->create($request->all());
        $book->authors()->attach($author->id);
        $book->categories()->attach($category->id);

        return $this->successResponse($book->load(['authors','categories']),201);

    }

    /**
     * Filter books by criteria
     *
     * @param Book $book
     * @param BookRequest $request
     * @return BookController|object
     */
    public function filter(Book $book, BookRequest $request)
    {
        $books = $book->with(['authors','categories']);

        $books = (new BooksFilter($books, $request))->apply()->get();

        return $this->successResponse($books);
    }
}
