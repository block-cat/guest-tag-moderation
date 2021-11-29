<?php

namespace BlockCat\GuestTagModeration\Providers;

use Flarum\Tags\Listener\CreatePostWhenTagsAreChanged;
use Flarum\Tags\Event\DiscussionWasTagged;
use Flarum\Tags\Post\DiscussionTaggedPost;
use Illuminate\Support\Arr;

class SaveTaggedPost extends CreatePostWhenTagsAreChanged
{
    public function handle(DiscussionWasTagged $event)
    {
        if ($event->actor->isGuest()) {
            // Flarum uses the ID from the Guest model which is 0 and breaks the integrity
            // We need to use dissociate and not just set user_id to null otherwise a serialization of Guest can be returned by the API
            $event->actor->id = NULL;
        }

        // copied from CreatePostWhenTagsAreChanged->handle()
        $post = DiscussionTaggedPost::reply(
            $event->discussion->id,
            $event->actor->id,
            Arr::pluck($event->oldTags, 'id'),
            $event->discussion->tags()->pluck('id')->all()
        );

        $event->discussion->mergePost($post);
    }
}
