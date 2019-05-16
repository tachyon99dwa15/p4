<?php

use Illuminate\Database\Seeder;
use App\Stock;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $stocks =[['AMZN', 'buy',1933, '2019-05-01', 10, 1.20, "hopefully a good buy"],
                 ['AMZN', 'sell',1827.95, '2019-05-15', 10, 1.20, "oh boy! sell at loss! haha"],
       ];

        $count = count($stocks);

        foreach ($stocks as $key => $stockData) {
            $stock = new Stock();

            $stock->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $stock->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $stock->stockSymbol = $stockData[0];
            $stock->buySell = $stockData[1];
            $stock->price = $stockData[2];
            $stock->date = $stockData[3];
            $stock->numberofShares  = $stockData[4];
            $stock->commissionPaid  = $stockData[5];
            $stock->JournalEntry  = $stockData[6];

            $stock->save();
            $count--;
        }


    }
}
