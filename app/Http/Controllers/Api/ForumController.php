<?php

namespace App\Http\Controllers\Api;

use App\DTOs\CreateWebDTO;
use App\DTOs\UpdateWebDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateWebForumRequest;
use App\Http\Requests\UpdateWebForumRequest;
use App\Http\Resources\ForumsResource;
use App\Models\Forum;
use App\Services\WebService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ForumController extends Controller
{
     public function __construct(protected WebService $service)
     {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $forums = Forum::paginate();

        $forums = $this->service->paginate(
            page: $request->get('page', 1),
            filter: $request->filter,
            totalPerPage: $request->get('per_page', 5)
        );

        return ForumsResource::collection($forums->itemsData())->additional([
            "meta" => [
                "total" => $forums->total(),
                "isFirstPage" => $forums->isFirstPage(),
                "isLastPage" => $forums->isLastPage(),
                "currentPage" => $forums->currentPage(),
                "nextPage" => $forums->getNumberNextPage(),
                "previousPage" => $forums->getNumberPreviousPage()
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateWebForumRequest $request)
    {
        $forum = $this->service->create(CreateWebDTO::makeFromRequest($request));

        return new ForumsResource($forum);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$forum = $this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }


        return new ForumsResource($forum);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWebForumRequest $request, string $id)
    {

        if (!$forum = $this->service->update(UpdateWebDTO::makeFromRequest($request, $id))) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new ForumsResource($forum);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
