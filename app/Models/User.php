<?php

namespace App\Models;

use App\Traits\SubscriptionTrait;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Searchable\Searchable;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Searchable\SearchResult;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Searchable, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Sortable, SubscriptionTrait;
    use HasRoles;

    protected $table = 'users';
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    const USER_TYPE_ADMIN = 1;
    const USER_TYPE_STAFF = 2;
    const USER_TYPE_VENDOR = 3;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'created_by',
        'profile_image',
        'status',
        'address',
        'city',
        'state',
        'country',
        'zip',
        'user_type',
        'email_verified_at',
        'last_login_at',
        'user_ip',
    ];

    public $sortable = [
        'id',
        'first_name',
        'email',
        'created_at',
        'phone_number',
        'email_verified_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'first_name' => "string",
        'last_name' => "string",
        'email' => "string",
        'password' => "string",
        'phone_number' => "string",
        'created_by' => "integer",
        'profile_image' => "string",
        'status' => "integer",
        'address' => "string",
        'city' => "string",
        'state' => "string",
        'country' => "string",
        'user_type' => "integer"
    ];

    public function getNameAttribute()
    {
        return ucfirst($this->first_name) . " " . ucfirst($this->last_name);
    }

    public function getLogoNameAttribute()
    {
        return ucfirst(substr($this->first_name, 0, 1));
    }

    public function setProfileImageAttribute($value)
    {
        $this->attributes['profile_image'] = uploadFile($value, 'profile');
    }

    public function getProfileUrlAttribute()
    {
        return getFileUrl($this->attributes['profile_image']);
    }

    public function getSearchResult(): SearchResult
    {
        $this->name;
        $user = auth()->user();
        if ($user->id == $this->id) {
            $url = route('admin.profile');
        } else {
            $url = route('admin.staff.edit', $this->id);
        }

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
