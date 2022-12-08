<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Certificate_by_instructor extends Model
{
    use HasFactory;

    protected $table = 'certificate_by_instructors';
    protected $primaryKey = 'id';

    protected $fillable = [
        'course_id',
        'certificate_id',
        'title',
        'title_x_position',
        'title_y_position',
        'title_font_size',
        'title_font_color',
        'body',
        'body_max_length',
        'body_x_position',
        'body_y_position',
        'body_font_size',
        'body_font_color',
        'role_2_x_position',
        'role_2_y_position',
    ];


    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }

}
