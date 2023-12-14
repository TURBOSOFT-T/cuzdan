<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
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
        ' registration_type',
        'first_name',
        'last_name',
        'birth_day',
        'gender',
        'region',
        'country',
        'state',
        'address',
        'city',
        'phone',
        'tc_vkn',
        'iban',
        'bank_name',
        'fx_rate',
        'category',
        'currency',
        'trade_name',
        'company_type',
        'mersis_no',

        'registration_number',
        'taxe_admin',
        'taxe_number',
        'email',
        'password',
        'image_path',
        'role',
        'valid',
        'avatar',
        'cover',
        'image',
         'isActive',
         'status',
         'approved',
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

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

     public function walletSallesCost(){
        return  $this->hasMany(WalletCostsheet::class);
    }

    public function wallet_order_lists(){
        return $this->hasMany(WalletOrderList::class);
    }
}