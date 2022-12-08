<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use IvanoMatteo\LaravelDeviceTracking\Traits\UseDevices;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, UseDevices, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'balance',
        'mobile_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function courses()
    {
        return $this->hasMany(Course::class, 'user_id');
    }

    public function students()
    {
        return $this->hasMany(Order_item::class, 'owner_user_id', 'id');
    }

    public function orderItems()
    {
        return $this->hasMany(Order_item::class, 'owner_user_id', 'id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'user_id');
    }

    public function ownerEnrollments()
    {
        return $this->hasMany(Enrollment::class, 'owner_user_id');
    }

    public function consultations()
    {
        return $this->hasMany(Enrollment::class, 'consultation_slot_id');
    }


    /**
     * @return bool
     */

    public function is_admin()
    {
        if ($this->role == 1) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */

    public function is_instructor()
    {
        if ($this->role == 2) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function is_organization()
    {
        if ($this->role == 4) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */

    public function is_student()
    {
        if ($this->role == 3) {
            return true;
        }
        return false;
    }


    public function instructor()
    {
        return $this->hasOne(Instructor::class);
    }

    public function organization()
    {
        return $this->hasOne(Organization::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function publishedBlogs()
    {
        return $this->hasMany(Blog::class)->where('status', 1);
    }

    public function unpublishedBlogs()
    {
        return $this->hasMany(Blog::class)->where('status', 0);
    }

    public function getImagePathAttribute()
    {
        if ($this->image)
        {
            return $this->image;
        } else {
            return 'uploads/default/instructor-default.png';
        }
    }

    public function card()
    {
        return $this->hasOne(User_card::class, 'user_id');
    }

    public function paypal()
    {
        return $this->hasOne(User_paypal::class, 'user_id');
    }

    public function emailNotification()
    {
        return $this->hasOne(Email_notification_setting::class, 'user_id');
    }

    public function exams()
    {
        return $this->hasMany(Exam::class, 'user_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notifiable::class, 'user_id');
    }

    public function unseenNotifications()
    {
        return $this->hasMany(Notifiable::class, 'user_id')->where('is_seen', 'no');
    }

    public function forumPostComments()
    {
        return $this->hasMany(ForumPostComment::class, 'user_id', 'id');
    }

    public function followings()
    {
        return $this->belongsToMany(User::class,'user_follower','user_id','follower_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class,'user_follower','follower_id','user_id');
    }
   
    public function badges()
    {
        return $this->belongsToMany(RankingLevel::class, 'user_badges', 'user_id' , 'ranking_level_id');
    }
}
