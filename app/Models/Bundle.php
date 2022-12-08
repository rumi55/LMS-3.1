<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bundle extends Model
{
    use HasFactory;

    public function bundleCourses()
    {
        return $this->hasMany(BundleCourse::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(Order_item::class);
    }
    
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
            $model->user_id =  auth()->id();
        });
    }
}
