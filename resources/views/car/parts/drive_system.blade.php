<label for="drive_system" class="form-label">Drive System</label>
<select id="drive_system" name="drive_system" class="form-select">
    <option value="">All Drive Systems</option>
    @foreach (config('car.drive_systems') as $drive_system)
        <option value="{{$drive_system}}" {{ (isset($selectedDriveSystem) && $selectedDriveSystem == $drive_system) || old('drive_system') == $drive_system ? 'selected' : '' }}>
            {{$drive_system}}
        </option>
    @endforeach
</select>