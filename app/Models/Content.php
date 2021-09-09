<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function pickups()
    {
        return $this->hasMany(Pickup::class);
    }

    // protected $dateFormat = 'U';

    public static function getAllOrderByDeadline()
    {
        return self::orderBy('limit', 'desc')->get();
    }
}
