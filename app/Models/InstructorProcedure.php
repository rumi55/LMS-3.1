<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorProcedure extends Model
{
    use HasFactory;

    public function getImagePathAttribute()
    {
        if ($this->image) {
            return $this->image;
        } else {
            return 'uploads/default/no-image-found.png';
        }
    }
}
