<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class practiceController extends Controller
{
    public function practice5()
    {
        $book = new Book();
        # Set the properties
        # Note how each property corresponds to a field in the table
        $book->title = 'Harry Potter and the Sorcerer\'s Stone';
        $book->author = 'J.K. Rowling';
        $book->published_year = 1997;
        $book->cover_url = 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg';
        $book->purchase_url = 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427';
        $book->save();
        dump($book->toArray());
    }
}
