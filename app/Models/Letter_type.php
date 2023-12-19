<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter_type extends Model
{
    use HasFactory;

    protected $table = 'letter_types';
    protected $fillable = ['letter_code', 'name_type'];

    public function Letter() {
        return $this->hasMany(Letter::class);
    }
}
