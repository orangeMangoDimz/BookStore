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

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = ['id'];
    protected $casts = [
        'releaseDate' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    public function bookContent()
    {
        return $this->hasMany(BookContent::class, 'book_id');
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