<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bus extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'image',
        'bus_number',
        'company_id',
        'bus_category_id',
        'seat_class_id',
    ];

    protected $searchableFields = ['*'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function busSchedules()
    {
        return $this->hasMany(BusSchedule::class);
    }

    public function seatClass()
    {
        return $this->belongsTo(SeatClass::class);
    }

    public function busCategory()
    {
        return $this->belongsTo(BusCategory::class);
    }
}
