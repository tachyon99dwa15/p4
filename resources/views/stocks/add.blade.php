@extends('layouts.master')

@section('title')
    Add a stock trade in Trade Journal
@endsection

@section('content')

    <h1>Add a stock trade</h1>

    <form method='POST' action='/stocks'>
        <div class='details'>* Required fields</div>
        {{ csrf_field() }}

        <div class="form-group">
        <label for='Stock Symbol'>* Stock Symbol </label>
        <input type='text' name='stockSymbol' id='stockSymbol' value='{{ old('stockSymbol') }}'>
        @include('includes.error-field', ['fieldName' => 'title'])
        </div>

        <div class="form-group">
        <label for='buySell'>* buySell </label>
        <input type='text' name='buySell' id='buySell' value='{{ old('buySell') }}'>
        @include('includes.error-field', ['fieldName' => 'buySell'])
        </div>

        <div class="form-group">
        <label for='price'>* Price </label>
        <input type='number' name='price' min="0" step=".01" id='price' value='{{ old('price' ) }}'>
        @include('includes.error-field', ['fieldName' => 'price'])
        </div>

        <div class="form-group">
        <label for='date'>* date</label>
        <input type='date' name='date' id='date' value='{{ old('date') }}'>
        @include('includes.error-field', ['fieldName' => 'date'])
        </div>

        <div class="form-group">
        <label for='numberofShares'>* numberofShares</label>
        <input type='number' name='numberofShares' min="0" id='numberofShares' value='{{ old('numberofShares') }}'>
        @include('includes.error-field', ['fieldName' => 'numberofShares'])
        </div>

        <div class="form-group">
        <label for='commissionPaid'>* commissionPaid </label>
        <input type='number' name='commissionPaid' min="0" step=".01" id='commissionPaid' value='{{ old('commissionPaid' ) }}'>
        @include('includes.error-field', ['fieldName' => 'commissionPaid'])
        </div>

        <div class="form-group">
        <label for='JournalEntry'>*  JournalEntry </label>
        <input type='text' name='JournalEntry' id='JournalEntry' value='{{ old('JournalEntry' ) }}'>
        @include('includes.error-field', ['fieldName' => 'JournalEntry'])
        </div>

    <input type='submit' class='btn btn-primary' value='Add stock trade'>
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