@extends('layouts.master')

@section('head')
    <link href='/css/books/delete.css' rel='stylesheet'>
@endsection

@section('title')
    Confirm deletion: {{ $stock->stockSymbol }}
@endsection

@section('content')
    <h1>Confirm deletion</h1>

    <p>Are you sure you want to delete <strong>{{ $stock->stockSymbol }} </strong> stock trade ?</p>



    <form method='POST' action='/stocks/{{ $stock->id }}'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Yes, delete it!' class='btn btn-danger btn-small'>
    </form>

    <p class='cancel'>
        <a href='/stocks/ViewExistingStocks'>No, I changed my mind.</a>
    </p>

@endsection