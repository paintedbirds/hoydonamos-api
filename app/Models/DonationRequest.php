<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class DonationRequest extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = [
        'reason',
        'state',
    ];
    protected $allowedFilters = [
        'state',
    ];
    /**
     * @var array
     */
    protected $allowedSorts = [
        'state',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
}
