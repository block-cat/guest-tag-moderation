<?php

namespace BlockCat\GuestTagModeration\Access;

use Flarum\User\Access\AbstractPolicy;
use Flarum\User\User;

class TagPolicy extends AbstractPolicy
{
    public function can(User $actor, string $ability)
    {
        if ($ability == 'createTag') {
            return $this->allow();
        }
    }
}
