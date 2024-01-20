<?php

namespace App\Policies;

use App\Models\Friendship;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FriendshipPolicy
{

    public function delete(User $user, User $friend): bool
    {
        return $user->acceptedFriendExists($friend);
    }
}
