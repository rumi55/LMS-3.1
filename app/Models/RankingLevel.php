<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RankingLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'earning_range_start',
        'earning_range_end',
        'student_range_start',
        'student_range_end',
    ];

    public function getImagePathAttribute()
    {
        if ($this->badge_image) {
            return $this->badge_image;

        } else {
            return 'uploads/default/no-image-found.png';
        }
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }
}
