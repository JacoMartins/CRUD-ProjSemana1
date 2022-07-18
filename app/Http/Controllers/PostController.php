<?php
namespace App\Http\Controllers;

use App\Http\Requests\PostCreateUpdate;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
  public function index() {
    $posts = Post::get();

    return view('admin.posts.index', [
      'posts' => $posts,
    ]);    
  }

  public function create(PostCreateUpdate $request){
    Post::create([
      'title' => $request->title,
      'content' => $request->content,
      'updated_at' => date(now()),
      'who_posted' => 'admin'
    ]);

    return redirect()
      ->route('posts.index')
      ->with('message', 'Post editado com sucesso.');
  }

  public function details($id){
    if(!$post = Post::where('id', $id)->first()) {
      return redirect()->route('posts.index');
    }

    return view('admin.posts.details', [
      'post' => $post,
    ]);
  }

  public function delete($id){
    if(!$post = Post::where('id', $id)->first()) {
      return redirect()->route('posts.index');
    }

    $post->delete();
    return redirect()
      ->route('posts.index')
      ->with('message', 'Post excluído com sucesso.');
  }

  public function edit($id){
    if(!$post = Post::where('id', $id)->first()) {
      return redirect()->route('posts.index');
    }
    
    return view('admin.posts.edit', [
      'post' => $post
    ]);
  }

  public function update(PostCreateUpdate $request, $id){
    if(!$post = Post::where('id', $id)->first()) {
      return redirect()->route('posts.index');
    }

    $post->update([
      'title' => $request->title,
      'content' => $request->content,
      'updated_at' => date(now()),
      'who_posted' => 'admin'
    ]);

    return redirect()
      ->route('posts.index')
      ->with('message', 'Post editado com sucesso.');
  }
}