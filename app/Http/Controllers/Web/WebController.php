<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateWebForumRequest;
use App\Http\Requests\UpdateWebForumRequest;
use App\Models\Forum;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(Forum $forum)
    {

        $forums = $forum->all();

        // dd($forums);

        return view("web/index", compact('forums'));
    }

    public function create()
    {

        return view('web/create');
    }

    public function store(CreateWebForumRequest $request, Forum $forum)
    {
       $data = $request->validated();

       $data['status'] = 'p';

       $forum->create($data);

       return redirect()->route('web.index');
    }

    public function show(string|int $id)
    {
       // $post = Forum::find($id);
        $post = Forum::where('id', $id)->first();
        if(!$post){
          return "Busca não econtrada";
        }

        return view('web/post', compact('post'));
    }

    public function edit(string|int $id)
    {
        $post = Forum::find($id);

        if(!$post){
            return "Busca não econtrada";
        }

        return view('web/edit', compact('post'));
    }

    public function update(UpdateWebForumRequest $request, string|int $id, Forum $post)
    {
        $post = $post->find($id);

        if(!$post){
            return "Busca não econtrada";
        }

       $post->update($request->only(['subject', 'content']));

       return redirect()->route('web.index');
    }

    public function delete(string|int $id, Forum $post)
    {
        $post = $post->find($id);

        if(!$post){
            return "Busca não econtrada";
        }

        $post->delete();

        return redirect()->route('web.index');
    }
}
