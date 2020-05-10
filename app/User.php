<?php

namespace App;

use App\Mail\AccountActivation;
use App\Mail\PasswordReset;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function activate()
    {
        $this->activated = true;
        $this->activated_at = Carbon::now();
        $this->save();
    }

    /**
     * アカウント有効化メールの送信
     *
     * @param $token トークン
     */
    public function sendActivateEmail($token)
    {
        Mail::to($this)->send(new AccountActivation($token, $this));
    }

    /**
     * アカウント再設定メールの送信
     *
     * @param $token トークン
     */
    public function sendPasswordResetMail($token)
    {
        Mail::to($this)->send(new PasswordReset($this, $token));
    }

    public function checkExpiration()
    {
        return $this->reset_sent_at < Carbon::now()->subHours(2);
    }

    public function feed()
    {
        $relations = $this->activeRelationships()->get()->toArray();
        $followed_ids = array_pluck($relations, "followed_id");
        return Micropost::whereIn("user_id", $followed_ids)->orWhere("user_id", $this->id);
    }

    public function microposts()
    {
        return $this->hasMany(Micropost::class);
    }

    public function activeRelationships()
    {
        return $this->hasMany(Relationship::class, "follower_id");
    }

    public function passiveRelationships()
    {
        return $this->hasMany(Relationship::class, "followed_id");
    }

    public function following()
    {
        return $this->hasManyThrough(User::class, Relationship::class, "follower_id", "id", "id", "followed_id");
    }

    public function followers()
    {
        return $this->hasManyThrough(User::class, Relationship::class, "followed_id", "id", "id", "follower_id");
    }

    public function isFollowing($user_id)
    {
        return (bool) Relationship::where("follower_id", $this->id)->where("followed_id", $user_id)->count();
    }

    public function follow($user_id)
    {
        $this->activeRelationships()->create(["followed_id" => $user_id]);
    }

    public function unfollow($user_id)
    {
        $this->activeRelationships()->where("followed_id", $user_id)->delete();
    }

    public function isFollowed($user_id)
    {

        return (bool) Relationship::where("follower_id", $user_id)->where("followed_id", $this->id)->count();
    }
}
