<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Staudenmeir\LaravelMergedRelations\Eloquent\HasMergedRelationships;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasMergedRelationships;

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

    public function threads() {
        return $this->hasMany(Thread::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function friendsTo() {
        return $this->belongsToMany(User::class, 'friendships', 'user_id', 'friend_id')
        ->withPivot('accepted')
        ->withTimestamps();
    }

    public function friendsFrom() {
        return $this->belongsToMany(User::class, 'friendships', 'friend_id', 'user_id')
        ->withPivot('accepted')
        ->withTimestamps();
    }

    public function friends() {
        return $this->mergedRelationWithModel(User::class, 'friends_view');
    }

    public function friendExists(User $user) {
        return !$this->friends->where('id', $user->id)->isEmpty();
    }

    public function pendingFriendsTo()
    {
        return $this->friendsTo()->wherePivot('accepted', false);
    }

    public function pendingFriendsToExists(User $user) {
        return $this->pendingFriendsTo()->where('users.id', $user->id)->exists();
    }

    public function pendingFriendsFrom()
    {
        return $this->friendsFrom()->wherePivot('accepted', false);
    }

    public function pendingFriendsFromExists(User $user) {
        return !$this->pendingFriendsFrom->where('id', $user->id)->isEmpty();
    }

    public function acceptedFriendsTo()
    {
        return $this->friendsTo()->wherePivot('accepted', true);
    }

    public function acceptedFriendsFrom()
    {
        return $this->friendsFrom()->wherePivot('accepted', true);
    }

    public function acceptedFriends() {
        return $this->mergedRelationWithModel(User::class, 'accepted_friends_view');
    }

    public function acceptedFriendExists(User $user) {
        return !$this->acceptedFriends->where('id', $user->id)->isEmpty();
    }

    // --------------------

    public function sentMessages() {
        return $this->hasMany(Message::class, 'sender_id', 'id');
    }

    public function receivedMessages() {
        return $this->hasMany(Message::class, 'receiver_id', 'id');
    }

    public function messages()
    {
        return $this->mergedRelationWithModel(User::class, 'messages_view')->orderBy('created_at', 'desc');
    }

    public function messagesWith(User $user)
    {
        $sent = $this->sentMessages()->where('receiver_id', $user->id)->get();
        $received = $this->receivedMessages()->where('sender_id', $user->id)->get();
        return $sent->merge($received)->sortByDesc('created_at');
    }
}
