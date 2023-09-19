<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Publisher extends Model
{
    use HasFactory;

        // ! Note :
        // * When using the UUID, also use the $keyType, $incrementing, and boot function

        protected $keyType = 'string';
        public $incrementing = false;
        protected $guarded = ['id'];

        public function book()
        {
            return $this->hasMany(Book::class);
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
