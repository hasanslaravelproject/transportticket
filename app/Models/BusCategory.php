<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusCategory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'total seat', 'seatnumbers'];

    protected $searchableFields = ['*'];

    protected $table = 'bus_categories';

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }
}
