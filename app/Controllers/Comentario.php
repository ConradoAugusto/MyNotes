<?php

namespace App\Controllers;

use App\Models\ComentarioModel;
use App\Models\PostModel;

class Comentario extends BaseController
{

  public function store()
  {
    $post = $this->request->getPost();

    $comentarioModel = new ComentarioModel();
    $postModel = new PostModel();

    $dadosPost = $postModel->find($post['id_post']);


    $dadosInsert = [
      'post_id' => $post['id_post'],
      'comentario' => $post['comentario']
    ];

    if ($comentarioModel->save($dadosInsert)) {
      return redirect()->to('post/view/' . $post['id_post']);
    } else {
      echo view('post', [
        'post' => $dadosPost,
        'comentarios' => $comentarioModel->where('post_id', $post['id_post'])->findAll(),
        'errors' => $comentarioModel->errors()
      ]);
    }
  }
}
