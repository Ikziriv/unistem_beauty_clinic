<?php

namespace App;

use Mail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Return the user's posts
     */
    public function posts(): HasMany
    {
        return $this->hasMany('App\Modules\Post\Post', 'user_id');
    }

    /**
     * Get the user's fullname titleized.
     */
    public function getFullnameAttribute(): string
    {
        return title_case($this->name);
    }

    public static function generatePassword()
    {
        // Generate random string and encrypt it. 
        return bcrypt(str_random(35));
    }

    public static function sendWelcomeEmail($user)
    {
      // Generate a new reset password token
      $token = app('auth.password.broker')->createToken($user);
      
      // Send email
      Mail::send('emails.regis', ['user' => $user, 'token' => $token], function ($m) use ($user) {
        $m->from('info@bamed.co.id', 'Bamed Apps');
        $m->to($user->email, $user->name)->subject('Info Bamed Registrasi');
      });
    }


}
