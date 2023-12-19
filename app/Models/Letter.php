<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $table = 'letters';
    protected $fillable = ['letter_perihal', 'recipient', 'content', 'attachment', 'notulis', 'letter_type_id'];

    protected $casts = [
        'recipient' => 'array',
    ];
    public function result() {
        return $this->hasMany(Result::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function letter_type()
    {
        return $this->belongsTo(Letter_type::class, 'letter_type_id');
    }
}
