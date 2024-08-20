<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::latest()->paginate(12);

        return view('index', ['cars' => $cars]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand' => 'required',
            'price' => 'required|max:1000000',
            'fuel' => 'required',
            'year' => 'required',
            'mileage' => 'required|max:2000000',
            'model' => 'required|max:50',
            'body_type' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validatedData['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('images'), $filename);
    
            $validatedData['image'] = 'images/' . $filename;
        }

        Car::create($validatedData);

        return redirect(route('cars.index'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $car->load('user');
        return view('car.show', ['car' => $car]);
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

    public function filter(Request $request){
        $query = Car::query();

        $query->ByParams(['brand', 'fuel', 'body_type']);

        $query->ByPrice($request->input('price'));

        $query->ByYear($request->input('year_from'), $request->input('year_to'));

        $cars = $query->paginate(12);

        return view('index', ['cars' => $cars]); 
    }
}
