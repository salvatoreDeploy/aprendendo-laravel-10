<?php

namespace App\Http\Controllers\Api;

use App\DTOs\CreateWebDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateWebForumRequest;
use App\Http\Resources\ForumsResource;
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
    public function index()
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
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
