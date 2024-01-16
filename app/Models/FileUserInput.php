<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUserInput extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function UserInput()
    {
        return $this->belongsTo(UserInput::class);
    }
}
