<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Book extends Model
{
    use HasFactory;

    // ! Note :
    // * When using the UUID, also use the $keyType, $incrementing, and boot function

    public $timestamps = false;
    protected $guarded = ['id'];
    protected $casts = [
        'releaseDate' => 'datetime'
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'id');
    }

    public static function boot()
    {
        parent::boot();
        // Generate a UUID value for the primary key
        self::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
        });
    }
}
