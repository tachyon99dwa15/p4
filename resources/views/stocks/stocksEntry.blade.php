@extends('layouts.master')

@section('title')
    View Existing Stocks in Journal
@endsection

@section('content')
    <h1>Stock Data Entry System</h1>

    <p>
    <form method='GET' action='stockDataProcess'>

        <select name="View Existing Stock Data" id="ExistingStocks" value='{{ $ExistingStocks }}'>
            <option value="Apple"> Apple</option>
            <option value="Amazon"> Amazon</option>
            <option value="Amazon"> Tesla</option>
            <option value="Amazon"> Google</option>
        </select><br>
        <br>
        <input type="submit" value='show'>
    </form>

    </p>
    </form>





@endsection