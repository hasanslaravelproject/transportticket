<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeatClass extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'unit_seat_price'];

    protected $searchableFields = ['*'];

    protected $table = 'seat_classes';

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }
}
