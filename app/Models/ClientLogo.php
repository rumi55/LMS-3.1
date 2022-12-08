<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientLogo extends Model
{
    use HasFactory;

    public function getImagePathAttribute()
    {
        if ($this->logo)
        {
            return $this->logo;
        } else {
            return 'uploads/default/no-image-found.png';
        }
    }
}
