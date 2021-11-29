<?php

/*
 * This file is part of Flarum.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace BlockCat\GuestTagModeration\Listener;

use Flarum\Tags\Event\DiscussionWasTagged;
use Flarum\Tags\Post\DiscussionTaggedPost;
use Illuminate\Support\Arr;

class SaveTaggedPost
{
    /**
     * @param DiscussionWasTagged $event
     * @return void
     */
    public function handle(DiscussionWasTagged $event)
    {
        var_dump("Hello");
        $post = DiscussionTaggedPost::reply(
            $event->discussion->id,
            NULL,
            // $event->actor->id,
            Arr::pluck($event->oldTags, 'id'),
            $event->discussion->tags()->pluck('id')->all()
        );

        $event->discussion->mergePost($post);
    }
}
