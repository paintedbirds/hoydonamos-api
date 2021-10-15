<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Donation extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'image',
        'state',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
