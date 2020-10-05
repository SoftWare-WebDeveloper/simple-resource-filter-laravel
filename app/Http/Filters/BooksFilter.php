<?php


namespace App\Http\Filters;


class BooksFilter extends BaseFilter
{

    public function whereISBN($search){

        return $this->builder->where("ISBN","$search");

    }

    public function whereTitle($search){

        return $this->builder->where("title","like","%$search%");

    }

    public function whereAuthor($search){

        return $this->builder->whereHas("authors",function ($query) use ($search) {
            $query->where('author',"like", "%$search%");
        });
    }

    public function whereCategory($search){

        return $this->builder->whereHas("categories", function ($query) use ($search) {
            $query->where('category',"like", "%$search%");
        });

    }

}
