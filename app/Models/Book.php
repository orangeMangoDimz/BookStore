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
    // * Book doesn't have timestamp, so mae sure it has false value

    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $casts = [
        'releaseDate' => 'datetime'
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
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