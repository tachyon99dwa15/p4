<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', 'StockDataController@view');
Route::view('/', 'welcome');

//Route::resource('stocks', 'StockDataController');

Route::get('/stocks/add', 'StockDataController@add');
Route::post('/stocks', 'StockDataController@store');


Route::get('/stocks/ViewExistingStocks','StockDataController@index');

# Show form to edit stock trades
Route::get('/stocks/{id}/edit', 'StockDataController@edit');
Route::put('/stocks/{id}', 'StockDataController@update');


# DELETE
Route::get('/stocks/{id}/delete', 'StockDataController@delete');
# Process the deletion of a stock trade
Route::delete('/stocks/{id}', 'StockDataController@destroy');


Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});
