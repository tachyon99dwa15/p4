@extends('layouts.master')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Stock Symbol</td>
                <td> buySell </td>
                <td> date </td>
                <td>Stock Price</td>
                <td>Number of Shares</td>
                <td>Commission Paid</td>
                <td>JournalEntry</td>
                <td colspan="1">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <td>{{$stock->id}}</td>
                    <td>{{$stock->stockSymbol}}</td>
                    <td>{{$stock->buySell}}</td>
                    <td>{{$stock->date}}</td>
                    <td>{{$stock->price}}</td>
                    <td>{{$stock->numberofShares}}</td>
                    <td>{{$stock->commissionPaid}}</td>
                    <td>{{$stock->JournalEntry}}</td>

                    <td>
                        <form action="/stocks/{{$stock->id}}/edit" method="get">
                            <input type='submit' value='Edit' class='btn btn-danger btn-small'>
                        </form>
                    </td>

                    <td>
                        <form action="/stocks/{{$stock->id}}/delete" method="get">
                            <input type='submit' value='Delete?' class='btn btn-danger btn-small'>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection