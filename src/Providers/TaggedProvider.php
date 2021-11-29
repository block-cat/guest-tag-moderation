<?php

namespace BlockCat\GuestTagModeration\Providers;

use Flarum\Foundation\AbstractServiceProvider;
use Flarum\Tags\Listener\CreatePostWhenTagsAreChanged;

class TaggedProvider extends AbstractServiceProvider
{
    public function register()
    {
        // execute SaveTaggedPost::class instead of CreatePostWhenTagsAreChanged::class
        $this->container->bind(CreatePostWhenTagsAreChanged::class, SaveTaggedPost::class);
    }
}
