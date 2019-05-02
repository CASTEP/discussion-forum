<?php

Route::group(['prefix' => 'discussion-forum', 'middleware' => 'discussion-forum-enabled'], function(){
    Route::resource('/', 'CASTEP\\DiscussionForum\\Controllers\\DiscussionForumController');
});
