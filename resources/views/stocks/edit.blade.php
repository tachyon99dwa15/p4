@extends('layouts.master')

@section('title')
    Edit a stock trade in Trade Journal
@endsection

@section('content')

    <h1>Edit your stock trade for {{ $stock->stockSymbol }} </h1>

    <form method='POST' action='/stocks/{{ $stock->id }} '>
        <div class='details'>* Required fields</div>
        {{ csrf_field() }}
        {{ method_field('put') }}



        <label for='buySell'>* buySell </label>
        <input type='text' name='buySell' id='buySell' value='{{ old('buySell', $stock->buySell) }}'>
        @include('includes.error-field', ['fieldName' => 'buySell'])

        <label for='price'>* Price </label>
        <input type='number' name='price' min="0" step=".01" id='price' value='{{ old('price', $stock->price) }}'>
        @include('includes.error-field', ['fieldName' => 'price'])

        <label for='date'>* date</label>
        <input type='date' name='date' id='date' value='{{ old('date', $stock->date) }}'>
        @include('includes.error-field', ['fieldName' => 'date'])

        <label for='numberofShares'>* numberofShares</label>
        <input type='number' name='numberofShares' min="0" id='numberofShares' value='{{ old('numberofShares', $stock->numberofShares) }}'>
        @include('includes.error-field', ['fieldName' => 'numberofShares'])

        <label for='commissionPaid'>* commissionPaid </label>
        <input type='number' name='commissionPaid' min="0" step=".01" id='commissionPaid' value='{{ old('commissionPaid', $stock->commissionPaid) }}'>
        @include('includes.error-field', ['fieldName' => 'commissionPaid'])

        <label for='JournalEntry'>*  JournalEntry </label>
        <input type='text' name='JournalEntry' id='JournalEntry' value='{{ old('JournalEntry' , $stock->JournalEntry ) }}'>
        @include('includes.error-field', ['fieldName' => 'JournalEntry'])

        <input type='submit' class='btn btn-primary' value='Save changes'>
</form>

    @if(count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
© 2019 GitHub, Inc.