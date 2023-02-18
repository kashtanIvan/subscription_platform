<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StorePostRequest;
use App\Services\StorePostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @OA\POST(
     *     path="/api/create/post",
     *     description="Create new post",
     *     @OA\RequestBody(
     *       @OA\MediaType(
     *         mediaType="multipart/form-data",
     *         @OA\Schema( required={"domain", "title", "description"},
     *           @OA\Property(property="domain", type="string"),
     *           @OA\Property(property="title", type="string"),
     *           @OA\Property(property="description", type="string")
     *           ),
     *         )
     *       ),
     *     @OA\Response(response="200", description="Create new post"),
     *     @OA\Response(response="422",description="Bad parameters"),
     *     ),
     * )
     */
    public function store(StorePostRequest $request, StorePostService $postService)
    {
//        $postService->storePost($request);
        return [$postService->storePost($request)];
    }
}
