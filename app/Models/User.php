<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'password' => 'hashed',
    ];

    static function getSingle($id){
        return User::find($id);
    }   


    static function getAdmin(){
        $return = User::select('users.*')
                        ->where('user_type','=',1)
                        ->where('is_delete','=',0);
                        if(!empty(Request::get('email'))){
                            $return = $return->where('email','like', '%' .Request::get('email').'%');
                        }
        $return = $return->orderBy('id','desc')
                        ->paginate(10);

        
        return $return;
    }

    static function getStudent(){
        $return = User::select('users.*')
                        ->where('user_type','=',3)
                        ->where('is_delete','=',0);
        $return = $return->orderBy('id','desc')
                        ->paginate(10);

        
        return $return;
    }

    static public function getEmailSingle($email){
        return User::where('email', '=', $email)->first();
    }

    static public function getTokenSingle($remember_token){
        return User::where('remember_token', '=', $remember_token)->first();
    }
}
