<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Services\Image\ImageService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Livewire\Response;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'photo',
        'phone',
        'status',
        'is_admin',
        'user_name'
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

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public static function saveUserImage($request)
    {
        $imageService = new ImageService;
        if ($request->hasFile('photo')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'user');
            $result = $imageService->save($request->file('photo'));
            if ($result === false) {
                return Response()->json([
                    'success' => false,
                    'message' => 'Sorry, image doesnt uploaded',
                    'data' => []
                ]);
            }
            return $result;
        }
    }

    public static function updateUserInfo($user, $request)
    {
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'photo' => self::saveUserImage($request),
        ]);

        $user->addresses()->create([
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'lat' => $request->lat,
            'lang' => $request->lang,
        ]);
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
