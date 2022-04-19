<?php
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

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


//www.miosito.it/login
Auth::routes();

//www.miosito.it/admin/*
Route::middleware('auth') //verifica se sei loggato
->namespace('Admin')
->name('admin.')
->prefix('admin')
->group(function() {

    // è come /admin/...
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('posts', 'PostController');
});

// Per la parte di front-office vogliamo utilizzare
// Vue con i suoi componenti.
// Ciò che dobbiamo fare è aggiungere alla fine
// del file web.php una rotta di fallback che va a
// mappare tutte le rotte non intercettate nelle
// istruzioni precedenti.
// Questa rotta viene gestita con una semplice
// closure che restituisce una view.

//www.miosito.it/qualsiasi cosa non precedentemente definita
Route::get("{any?}", function(){
    return view('guests.home');
})->where("any",".*");