<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use DeepCopy\f001\A;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
    protected $hidden = [ // hidden attributes that do not send back to JSON responses client
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [ // cast a field in object to some related data type
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function role(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ["user", "editor", "admin"][$value],
            /*
            This line of code is a short arrow function in PHP.
            It takes an input $value and uses it as an index to return 
            a corresponding string from the array ["user", "editor", "admin"].

            For example, if $value is 0, the function will return "user".
            If $value is 1, it will return "editor", and if $value is 2, it will return "admin".
            If $value is outside the range of 0-2, it will return null.
            */
        );
        // can change the return to: return ["user", "editor", "admin"][$value];
    }
}
