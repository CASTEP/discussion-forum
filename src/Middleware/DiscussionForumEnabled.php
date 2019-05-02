<?php

namespace CASTEP\DiscussionForum\Middleware;

use Closure;

class DiscussionForumEnabled
{
    public function handle($request, Closure $next)
    {
        return $request($next);
    }
}
