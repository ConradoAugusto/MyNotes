<?php

namespace App\Controllers;

use App\Models\ComentarioModel;
use App\Models\PostModel;
use Config\Paths;

class Post extends BaseController
{

    public function index()
    {

        return view('post/home');
    }

    public function view($id)
    {
        $postModel = new PostModel();

        $comentarioModel = new ComentarioModel();

        $dados = [
            'post' => $postModel->find($id),
            'comentarios' => $comentarioModel->where('post_id', $id)->orderBy('created_at', 'desc')->findAll()
        ];

        return view('post', $dados);
    }

    public function create()
    {
        return view('form', [
            'title' => 'New Post'
        ]);
    }

    public function store()
    {
        $postModel = new PostModel();
        $post = $this->request->getPost();

        if ($test = $postModel->save($post)) {
            return redirect()->to('/post/sucesso');
        } else {
            echo view('form', [
                'title' => 'Novo Post',
                'errors' => $postModel->errors()
            ]);
        }
    }

    public function sucesso()
    {
        return view('sucesso');
    }

    public function edit($id)
    {
        $postModel = new PostModel();
        $post = $postModel->find($id);

        $dados = [
            'title' => 'Edit Post',
            'post' => $post
        ];
        return view('form', $dados);
    }

    public function delete($id)
    {
        $postModel = new PostModel();

        if ($postModel->delete($id)) {
            return redirect()->to('/post/sucesso')->with('mensagem', 'Post excluído com sucesso.');
        }
    }
}
