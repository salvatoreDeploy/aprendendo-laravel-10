<?php

namespace App\Http\Controllers\Web;

use App\DTOs\CreateWebDTO;
use App\DTOs\UpdateWebDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateWebForumRequest;
use App\Http\Requests\UpdateWebForumRequest;
use App\Models\Forum;
use App\Services\WebService;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public function __construct(protected WebService $service)
    {}

    public function index(Request $request)
    {

        $forums = $this->service->paginate(
            page: $request->get('page', 1),
            filter: $request->filter,
            totalPerPage: $request->get('per_page', 1)
        );

        /*
        $forums = Forum::paginate();
        {{ $forums->links(); }}
        */

        // dd($forums->itemsData());

        $filter = ['filter' => $request->get('filter', '')];

        return view("web/index", compact('forums', 'filter'));
    }

    public function create()
    {
        return view('web/create');
    }

    public function store(CreateWebForumRequest $request, Forum $forum)
    {
      /* $data = $request->validated();

       $data['status'] = 'p';

       $forum->create($data); */

       $this->service->create(CreateWebDTO::makeFromRequest($request));

       return redirect()->route('web.index')->with('message', 'Post criado com suacesso');
    }

    public function show(string $id)
    {
        // $post = Forum::find($id);
        // $post = Forum::where('id', $id)->first();

        $post = $this->service->findOne($id);

        if(!$post){
          return "Busca não econtrada";
        }

        return view('web/post', compact('post'));
    }

    public function edit(string $id)
    {
        // $post = Forum::find($id);

        $post = $this->service->findOne($id);

        if(!$post){
            return "Busca não econtrada";
        }

        return view('web/edit', compact('post'));
    }

    public function update(UpdateWebForumRequest $request, string|int $id, Forum $post)
    {
        // $post = $post->find($id);

        $post = $this->service->findOne($id);

        if(!$post){
            return "Busca não econtrada";
        }

       // $post->update($request->only(['subject', 'content']));

        $this->service->update(UpdateWebDTO::makeFromRequest($request));

       return redirect()->route('web.index')->with('message', 'Post editado com suacesso');
    }

    public function delete(string|int $id, Forum $post)
    {
        // $post = $post->find($id);

        $post = $this->service->findOne($id);

        if(!$post){
            return "Busca não econtrada";
        }

        // $post->delete();

        $this->service->delete($id);

        return redirect()->route('web.index')->with('message', 'Post deletado com sucesso');
    }
}
