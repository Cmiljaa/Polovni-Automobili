<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;
use Illuminate\Support\Facades\Cache;

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
        return view('user.registration');
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

        $user = User::create($validatedData);

        Auth::login($user);
        
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
        $user = User::findOrFail($id);
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:80|min:8', 
            'email' => 'required|email',
            'phone' => 'required|min:5|max:15',
            'password' => 'required|min:8|same:confirm_password'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user->update($validatedData);

        return redirect(route('cars.index'))->with('success', 'Successfully updated profile!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('admin.dashboard'))->with('success', 'Successfully deleted user!');
    }

    public function login(){
        return view('user.login');
    }

    public function handleLogin(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt($validatedData)){
            $request->session()->regenerate();
            if(Auth::user()->is_admin){
                return redirect('/admin');
            }
            return redirect(route('cars.index'))->with('success', 'Successfully logged in!');
        }

        return view('user.login', ['email' => 'Invalid credentials']);
    }

    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('cars.index'))->with('success', 'Successfully logged out!');
    }

    public function list(){

        $cars =  Car::where('user_id', Auth::id())->latest()->paginate(12);

        return view('user.list', ['cars' => $cars]);
    }
}