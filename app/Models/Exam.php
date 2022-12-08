<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exams';
    protected $primaryKey = 'id';

    protected $fillable = [
        'course_id',
        'name',
        'short_description',
        'marks_per_question',
        'duration',
        'type',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'exam_id');
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
