<?php

namespace App\Http\Controllers\ServiceRepository;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function index()
    {
        $title = 'Belajar Service Repository Pattern';
        $posts = $this->postService->getAllPosts();

        return view('service-repository.index', compact('title', 'posts'));
    }

    public function create(Request $request)
    {
        $this->postService->createPost($request->all());

        return back()->withSuccess('Berhasil menambahkan postingan baru');
    }

    public function update(Request $request, $id)
    {
        $this->postService->updatePost($request->all(), $id);

        return back()->withSuccess('Berhasil memperbarui data postingan');
    }

    public function delete($id)
    {
        $this->postService->deletePost($id);

        return back()->withSuccess('Berhasil menghapus data postingan');
    }
}
