<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        //$categories = Post::all();
        return view('admin.post.show', compact('post'));
    }
}
