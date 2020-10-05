<?php

namespace App\Http\Controllers;

use App\Http\Filters\BooksFilter;
use App\Http\Filters\CategoryFilter;
use App\Http\Traits\Responses;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CategoryController extends BaseController
{
    use Responses;

    public function filter(Category $category, Request $request)
    {
        $books = (new CategoryFilter($category, $request))->apply()->get();

        return $this->successResponse($books);

    }
}
