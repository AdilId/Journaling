<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ['name', 'date', 'journal'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
