<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand', 'model', 'body_type', 'mileage', 'price', 'year', 'power', 'fuel', 'transmission',
        'drive_system', 'cubic_capacity', 'number_of_seats', 'door_count', 'user_id'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function carimages(): HasMany{
        return $this->hasMany(CarImage::class);
    }

    public function scopeFliterByAttributes($query, array $params)
    {
        foreach ($params as $param) {
            $value = request()->input($param);
            if (!empty($value)) {
                $query->where($param, $value);
            }
        }

        return $query;
    }

    public function scopeFilterByMaxLimits($query, array $params){
        foreach($params as $param){
            $value = request()->input($param);
            if (!empty($value)) {
                $query->where($param, '<=', $value);
            }
        }

        return $query;
    }

    public function scopeFilterByYear($query, $yearFrom, $yearTo){
        if($yearFrom && $yearTo){
            $min = min($yearFrom, $yearTo);
            $max = max($yearFrom, $yearTo);
            return $query->whereBetween('year', [$min, $max]);
        }

        if($yearFrom){
            return $query->where('year', '>=', $yearFrom);
        }

        if($yearTo){
            return $query->where('year', '<=', $yearTo);
        }

        return $query;
    }

    public function scopeSort($query, $sort){
        $sort = $sort ? $sort : "created_at,desc";
        $sort = explode(',', $sort);
        return $query->orderBy($sort[0], $sort[1]);
    }
}
