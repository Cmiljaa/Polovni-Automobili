<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $users = User::latest()->get();
        $cars = Car::latest()->get();
        return view('admin.dashboard', ['cars' => $cars, 'users' => $users]);
    }

    public function allow(Car $car, string $bool){
        $bool = filter_var($bool, FILTER_VALIDATE_BOOLEAN);
        $car->allowed = $bool;
        $car->save();
        $allow = $bool ? "allowed" : "unallowed";
        return redirect(route('admin.dashboard'))->with('success', "Successfully $allow car!");
    }
}
