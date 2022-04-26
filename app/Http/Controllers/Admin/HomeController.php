<?php
//controller creato da noi

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
//per usare facade Auth
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {

        //esempi di utilizzo carbon
        $endOfCurrentMonth = Carbon::now()->endOfDay()->endOfMonth();
        $now = Carbon::now();
        $diffInDays = $endOfCurrentMonth->diffInDays($now);
        //dd($now->format('d/m/Y h:i:s'));

        //prelevo tutti i dati inseriti dall'utente
        $user = Auth::user();

        //reindirizza alla pagina
        return view('admin.home', compact('user', 'diffInDays'));

    }
}
