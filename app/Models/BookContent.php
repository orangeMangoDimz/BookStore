<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class BookContent extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = ['id'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }


    public static function boot()
    {
        parent::boot();
        // Generate a UUID value for the primary key
        self::creating(function ($model) {
            $model->id = uuid::uuid4()->toString();
        });
    }
}