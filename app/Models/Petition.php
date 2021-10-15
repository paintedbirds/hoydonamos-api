<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Petition extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'subject',
        'description',
        ];
    protected $with = ['user'];
    
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
