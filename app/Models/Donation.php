<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class Donation extends Model
{
    use HasFactory, SoftDeletes, AsSource, Filterable;

    protected $fillable = [
        'name',
        'description',
        'image',
        'state',
    ];
     protected $allowedFilters = [
        'name',
        'state',
    ];

    /**
     * @var array
     */
    protected $allowedSorts = [
        'name',
        'state',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
