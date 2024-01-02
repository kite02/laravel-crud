<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index()
    {
        return view('books.index',['books'=>Book::paginate(5)]);
    }

    public function show($slug){
        return view('books.show',['book'=>Book::all()->where('slug',$slug)->first()]);
    }

    public function create()
    {

    }



    public function store(){

        $attributes = array_merge($this->validatePost(), [
            'thumbnail' => request()->file('thumbnail')->store('thumbnails','public'),
            'slug' => str_replace(' ','-',request()->title),
        ]);


        Book::create($attributes);

        return back()->with('success',"book created");

    }

    public function validatePost(?Book $book = null): array
    {
        $book ??= new Book();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $book->exists ? ['image'] : ['required', 'image'],
            'author' => 'required',
            'description' => 'required',
        ]);

    }
}
