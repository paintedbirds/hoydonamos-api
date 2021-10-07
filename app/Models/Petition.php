<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
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
