<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

class StockDataController extends Controller
{

    public function index()
    {
        $stocks = Stock::all();

        return view('stocks.index', compact('stocks'));
    }

    public function view(Request $request)
    {

        return view('stocks.stocksEntry')->with([
            'ExistingStocks' => $request->session()->get('ExistingStocks')
            ]);
    }

    public function stockDataProcess(Request $request)
    {
    $request->input('ExistingStocks');


    }

    public function show($id)
    {
        $stock = Stock::find($id);
        if (!$stock) {
            return redirect('/stocks')->with(['alert' => 'The stock trade you were looking for was not found.']);
        }
        return view('stocks.show')->with([
            'stock' => $stock
        ]);
    }

    public function add()
    {
        return view('stocks.add');
    }

    public function store(Request $request)
    {
        # Validate the request data
        $request->validate([
            'stockSymbol' => 'required|alpha',
            'buySell' => 'required|alpha',
            'date' => 'required|date',
            'price' => 'required|numeric',
            'numberofShares' => 'required|integer|min:0',
            'commissionPaid' => 'required|numeric',
            'JournalEntry' => 'required'
        ]);
        # Note: If validation fails, it will redirect the visitor back to the form page
        # and none of the code that follows will execute.
        $stock = new Stock();
        $stock->stockSymbol = $request->stockSymbol;
        $stock->buySell = $request->buySell;
        $stock->date = $request->date;
        $stock->price = $request->price;
        $stock->numberofShares = $request->numberofShares;
        $stock->commissionPaid = $request->commissionPaid;
        $stock->JournalEntry = $request ->JournalEntry;
        $stock->save();
        return redirect('/stocks/add')->with(['alert' => 'The book ' . $stock->stockSymbol . ' was added.']);
    }


    public function revise()
    {

        return view('stocks.revise');
    }

    public function edit($id)
    {
        $stock = Stock::find($id);
        if (!$stock) {
            return redirect('/stocks/ViewExistingStocks')->with(['alert' => 'The stock you were looking for was not found.']);
        }
        return view('stocks.edit')->with(['stock' => $stock]);
    }
    /*
     * PUT /books/{id}
     */
    public function update(Request $request, $id)
    {
        $stock = Stock::find($id);
      //  $stock->stockSymbol = $request->stockSymbol;
        $stock->buySell = $request->buySell;
        $stock->date = $request->date;
        $stock->numberofShares = $request->numberofShares;
        $stock->commissionPaid = $request->commissionPaid;
        $stock->JournalEntry = $request ->JournalEntry;
        $stock->save();
        return redirect('/stocks/' . $id . '/edit')->with(['alert' => 'Your changes were saved.']);
    }


    public function delete($id)
    {
        $stock = Stock::find($id);
        if (!$stock) {
            return redirect('/stocks')->with(['alert' => 'Stock trade not found']);
        }
        return view('stocks.delete')->with([
            'stock' => $stock,
        ]);
    }
    /*
    * Deletes the book
    * DELETE /books/{id}/delete
    */
    public function destroy($id)
    {
        $stock = Stock::find($id);

        $stock->delete();
        return redirect('/stocks/ViewExistingStocks')->with([
            'alert' => '“' . $stock->stockSymbol . '” was removed.'
        ]);
    }
}
