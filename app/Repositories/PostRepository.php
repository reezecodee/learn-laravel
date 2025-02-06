<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function createPost(array $data) 
    {
        return Post::create($data);
    }

    public function getAllPosts()
    {
        return Post::all();
    }

    public function deletePost($id)
    {
        return Post::findOrFail($id)->delete();
    }

    public function updatePost(array $data, $id)
    {
        return Post::findOrFail($id)->update($data);
    }
}
