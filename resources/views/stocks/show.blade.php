@extends('layouts.master')

@section('title')
    {{ $stock->stockSymbol }}
@endsection

@section('head')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
    <link href='/css/books/show.css' rel='stylesheet'>
@endsection

@section('content')
    <h1>{{ $stock->stockSymbol }}</h1>

    <div class='stock cf'>
        <img src='{{ $book->cover_url }}' class='cover' alt='Cover image for {{ $book->title }}'>
        <p>By {{ $book->author->getFullName() }} ({{ $book->published_year }})</p>
        <p>Added {{ $book->created_at->format('m/d/y') }}</p>

        <p>
            @foreach($book->tags as $tag)
                <span class='tag'>{{ $tag->name }}</span>
            @endforeach
        </p>

        <ul class='bookActions'>
            <li><a href='{{ $book->purchase_url }}'><i class="fas fa-shopping-cart"></i> Purchase</a>
            <li><a href='/books/{{ $book->id }}/edit'><i class="fas fa-edit"></i> Edit</a>
            <li><a href='/books/{{ $book->id }}/delete'><i class="fas fa-trash"></i> Delete</a>
        </ul>
    </div>
@endsection