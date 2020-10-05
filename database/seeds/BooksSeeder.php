<?php

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Author::truncate();
        Book::truncate();

        // Create Category
        $php = Category::create([
            "category" => "PHP"
        ]);

        $js = Category::create([
            "category" => "Javascript"
        ]);

        $linux = Category::create([
            "category" => "Linux"
        ]);

        // Authors
        $authorRobin = Author::create([
            "author" => "Robin Nixon"
        ]);

        $authorCristopher = Author::create([
            "author" => "Cristopher Negus"
        ]);

        $authorDouglas = Author::create([
            "author" => "Douglas Crockford"
        ]);

        // Books

        $book1 = Book::create([
            "ISBN" => "978-1491918661",
            "title" => "Learning​ ​ PHP, MySQL​ ​ & JavaScript:​ ​ With jQuery,​ ​ CSS​ ​ & HTML5",
            "price" => '9,99'
        ]);

        $book1->authors()->attach($authorRobin->id);
        $book1->categories()->attach([
            $php->id,$js->id
        ]);

        $book2 = Book::create([
            "ISBN" => "978-0596804848",
            "title" => "Ubuntu:​ ​ Up​ ​ and Running:​ ​ A Power​ ​ User's Desktop​ ​ Guide",
            "price" => '12.99​'
        ]);
        $book2->authors()->attach($authorRobin->id);
        $book2->categories()->attach([
            $linux->id
        ]);

        $book3 = Book::create([
            "ISBN" => "978-1118999875",
            "title" => "Linux​ ​ Bible",
            "price" => '19.99​'
        ]);
        $book3->authors()->attach($authorCristopher->id);
        $book3->categories()->attach([
            $linux->id
        ]);

        $book4 = Book::create([
            "ISBN" => "978-0596517748",
            "title" => "JavaScript:​ ​ The Good​ ​ Parts",
            "price" => '8.99​'
        ]);
        $book4->authors()->attach($authorDouglas->id);
        $book4->categories()->attach([
            $js->id
        ]);
    }
}
