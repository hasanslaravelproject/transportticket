<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusSchedule extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['date', 'bus_id', 'bus_route_id'];

    protected $searchableFields = ['*'];

    protected $table = 'bus_schedules';

    protected $casts = [
        'date' => 'datetime',
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function busRoute()
    {
        return $this->belongsTo(BusRoute::class);
    }
}
