<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService {
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function createPost($data)
    {
        return $this->postRepository->createPost($data);
    }

    public function getAllPosts()
    {
        return $this->postRepository->getAllPosts();
    }

    public function updatePost($data, $id)
    {
        return $this->postRepository->updatePost($data, $id);
    }

    public function deletePost($id)
    {
        return $this->postRepository->deletePost($id);
    }
}
