@php
    $brands = ["Abarth", "Acura", "Alfa-Romeo", "Alpina", "Aston-Martin", "Audi", "Bentley", "BMW",
    "Bugatti","Buick", "Cadillac", "Chevrolet", "Chrysler","Citroen", "Cupra", "Dacia", "Dodge",
    "Ferrari","Fiat", "Ford", "Genesis", "GMC", "Honda", "Hyundai" , "Infiniti", "Jaguar", "Jeep","Kia",
    "Koenigsegg", "Lamborghini", "Land-Rover", "Lexus", "Lincoln", "Lotus", "Mazda", "Maserati", "McLaren",
    "Mercedes-Benz", "Mini", "Mitsubishi", "Nissan", "Pagani","Peugeot", "Porsche", "RAM", "Renault",
    "Rolls-Royce", "SEAT", "Skoda", "Subaru", "Suzuki", "Tesla","Toyota", "Volkswagen", "Volvo"];
@endphp
<label for="brand" class="form-label">Brand</label>
<select id="brand" class="form-select" name="brand">
    <option value="">All Brands</option>
    @foreach ($brands as $brand)
        <option value="{{$brand}}" {{ (isset($selectedBrand) && $selectedBrand == $brand) || old('brand') == $brand ? 'selected' : '' }}>
            {{$brand}}
        </option>
    @endforeach
</select>