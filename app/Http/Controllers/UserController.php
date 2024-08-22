<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:80|min:8', 
            'email' => 'required|email',
            'phone' => 'required|min:5|max:15',
            'password' => 'required|min:8|same:confirm_password'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        
        return redirect(route('cars.index'))->with('success', 'Successfully created profile!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(){
        return view('login');
    }

    public function handleLogin(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt($validatedData)){
            $request->session()->regenerate();
            return redirect(route('cars.index'))->with('success', 'Successfully logged in!');
        }

        return view('login', ['email' => 'Invalid credentials']);
    }

    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('cars.index'))->with('success', 'Successfully logged out!');
    }

    public function list(){

        $cars = Car::where('user_id', Auth::id())->latest()->paginate(12);

        return view('list', ['cars' => $cars]);
    }
}