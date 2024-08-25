<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;



class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::latest()->with('carimages')->paginate(12);

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
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validatedData['user_id'] = Auth::id();

        $car = Car::create($validatedData);
        $carId = $car->id;

        $images = $request->images;
        foreach ($images as $image) {
            $fileOriginalName = $image->getClientOriginalExtension();
            $fileNewName = time() .'.'. $fileOriginalName;
            $image->storeAs('images', $fileNewName, 'public');

            $manager = new ImageManager(new Driver());

            $image = $manager->read($image->getRealPath());

            $watermark = $manager->read(public_path('storage/images/watermark.png'));

            $image = $image->place($watermark, 'center');

            $image->save(public_path('storage/images/' . $fileNewName));

            CarImage::create([
                'car_id' => $carId,
                'image' => 'storage/images/' . $fileNewName
            ]);
        }

        return redirect(route('cars.index'))->with('success', 'Successfully created car!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $car->load('user')->with('carimages');
        return view('car.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('car.edit', ['car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $validatedData = $request->validate([
            'brand' => 'required',
            'price' => 'required|max:1000000',
            'fuel' => 'required',
            'year' => 'required',
            'mileage' => 'required|max:2000000',
            'model' => 'required|max:50',
            'body_type' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validatedData['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('storage/images'), $filename);

            if (File::exists(public_path($car->image))) {
                File::delete(public_path($car->image));
            }
    
            $validatedData['image'] = 'storage/images/' . $filename;
        }

        $car->update($validatedData);

        return redirect(route('user.list'))->with('success', 'Successfully updated car!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        if (File::exists(public_path($car->image))) {
            File::delete(public_path($car->image));
        }
        $car->delete();
        return redirect(route('user.list'))->with('success', 'Successfully deleted car!');
    }

    public function filter(Request $request){
        $query = Car::query();

        $query->ByParams(['brand', 'fuel', 'body_type']);

        $query->ByPrice($request->input('price'));

        $query->ByYear($request->input('year_from'), $request->input('year_to'));

        $cars = $query->latest()->paginate(12);

        return view('index', ['cars' => $cars]); 
    }
}
