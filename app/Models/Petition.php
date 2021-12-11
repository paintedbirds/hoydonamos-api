<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;


class Petition extends Model
{
    use HasFactory, SoftDeletes, AsSource, Filterable;
    
    protected $fillable = [
        'subject',
        'description',
        ];
    protected $with = ['user'];

    protected $allowedFilters = [
        'subject',
    ];

    /**
     * @var array
     */
    protected $allowedSorts = [
        'name',
    ];
    /**
     * Functions of each model
     * 
     * - user() # each petition has an user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
