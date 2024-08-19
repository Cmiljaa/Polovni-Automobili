<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::latest()->get();

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
        //
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

        if($request->filled('brand'))
            $query->where('brand', $request->input('brand'));

        if($request->filled('fuel'))
            $query->where('fuel', $request->input('fuel'));

        if($request->filled('price'))
            $query->where('price', '<=', $request->input('price'));

        if ($request->filled('year_from') && $request->filled('year_to')) {
            $yearFrom = min($request->input('year_from'), $request->input('year_to'));
            $yearTo = max($request->input('year_from'), $request->input('year_to'));
            $query->whereBetween('year', [$yearFrom, $yearTo]);
        } elseif ($request->filled('year_from')) {
            $query->where('year', '>=', $request->input('year_from'));
        } elseif ($request->filled('year_to')) {
            $query->where('year', '<=', $request->input('year_to'));
        }

        if($request->filled('body_type'))
            $query->where('body_type', $request->input('body_type'));

        $cars = $query->get();

        return view('index', ['cars' => $cars]); 
    }
}
