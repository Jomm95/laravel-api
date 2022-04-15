<?php
//controller creato da noi

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {

        $user = Auth::user();

        //controllo se user è loggato(qua non serve perchè il controller già lo fa)
        if (Auth::check()) {
            echo "Sei loggato!";
        } else {
            echo "Non sei loggato!";
        }

        //reindirizza alla pagina
        return view('admin.home', compact('user'));

    }
}
