<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
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
        $cacheKey = request()->get('page', 1) . Car::where('allowed', true)->count();

        if(Cache::has($cacheKey)){
            $cars = Cache::get($cacheKey);
        }
        else{
            $cars = Cache::remember($cacheKey, 600, function(){
                return Car::latest()->where('allowed', true)->paginate(12);
            });
        }

        return view('car.index', ['cars' => $cars]);
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
    public function store(CarRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['user_id'] = Auth::id();

        $car = Car::create($validatedData);
        
        $this->addImages($request->images, $car->id);

        return redirect(route('cars.index'))->with('success', 'Your car has been successfully submitted! It will be reviewed and approved by our team within the next few hours.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $cacheKey = $car->id;
        
        if(Cache::has($cacheKey)){
            $car = Cache::get($cacheKey);
        }
        else{
            $car = Cache::remember($cacheKey, 600, function() use($car){
                return $car->load(['user', 'carimages']);
            });
        }
        
        $cars = Car::where('user_id', $car->user_id)->where('allowed', true)->where('id', '!=', $car->id)
        ->inRandomOrder()->limit(9)->get();
        return view('car.show', ['car' => $car, 'cars' => $cars]);
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
    public function update(CarRequest $request, Car $car)
    {
        $this->deleteImages($car->carimages);

        $car->carimages()->delete();

        Cache::forget($car->id);

        $validatedData = $request->validated();

        $validatedData['user_id'] = Auth::id();

        $car->update($validatedData);

        $this->addImages($request->images, $car->id);

        return redirect(route('user.list'))->with('success', 'Successfully updated car!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        if (!Auth::user()->is_admin && Auth::user()->id != $car->user_id) {
            abort(403);
        }
        
        $car = $car->load('carimages');
        $this->deleteImages($car->carimages);
        $car->delete();
        return redirect()->back()->with('success', 'Successfully deleted car!');
    }

    public function filter(Request $request){
        $query = Car::query();

        $query->FliterByAttributes(['brand', 'fuel', 'body_type', 'model']);

        $query->FilterByMaxLimits(['price', 'power', 'mileage', 'cubic_capacity', 'door_count', 'number_of_seats']);

        $query->FilterByYear($request->input('year_from'), $request->input('year_to'));

        $query->Sort($request->input('sort'));

        $cars = $query->where('allowed', true)->paginate(12);

        return view('car.index', ['cars' => $cars]);
    }

    public function deleteImages($images){
        foreach($images as $image){
            if (File::exists(public_path($image->image))){
                File::delete(public_path($image->image));
            }
            if($image->exists){
                $image->delete();
            }
        }
    }

    public function addImages($images, $carId)
    {
        foreach ($images as $image) {
            $fileOriginalName = $image->getClientOriginalName();

            $fileNewName = time() .'.'. $fileOriginalName;

            $image->storeAs('images', $fileNewName, 'public');

            $manager = new ImageManager(new Driver());

            $image = $manager->read($image->getRealPath());

            if($image->width()<$image->height()){
                $image->resize(810, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }else{
                $image->resize(1440, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }

            $watermark = $manager->read(public_path('storage/images/watermark.png'));

            $image = $image->place($watermark, 'center');

            $image->save(public_path('storage/images/' . $fileNewName));

            CarImage::create([
                'car_id' => $carId,
                'image' => 'storage/images/' . $fileNewName
            ]);
        }
    }
}