<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Genre extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = ['id'];

    public function book()
    {
        return $this->hasMany(Book::class, 'genre_id');
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