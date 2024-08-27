<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $users = User::where('is_admin', false)->latest()->get();
        $cars = Car::latest()->get();
        return view('admin.dashboard', ['cars' => $cars, 'users' => $users]);
    }

    public function allow(Car $car, string $allowed){
        $allowed = filter_var($allowed, FILTER_VALIDATE_BOOLEAN);
        $car->allowed = $allowed;
        $car->save();
        $allow = $allowed ? "allowed" : "unallowed";
        return redirect(route('admin.dashboard'))->with('success', "Successfully $allow car!");
    }
}
