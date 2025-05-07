<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\TagStoreRequest;
use App\Http\Requests\TagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use App\Services\Tag\TagService;
use Illuminate\Support\Facades\Cache;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {
        $tags = Tag::all();
        return TagResource::collection($tags);
    }

    public function store(TagStoreRequest $tagStoreRequest)
    {
        $data = $tagStoreRequest->validated();
        $tag = $this->tagService->store($data);
        return new TagResource($tag);
    }

    public function edit(Tag $tag, TagStoreRequest $tagStoreRequest)
    {
        $data = $tagStoreRequest->validated();
        $tag = $this->tagService->update($tag, $data);
        return new TagResource($tag);
    }

    public function show(Tag $tag)
    {
        $tagWithTasks = $tag->load('tasks');

        return new TagResource($tagWithTasks);
    }

    public function destroy(Tag $tag)
    {
        if ($tag->tasks()->exists()) {
            return response()->json([
                "error" => "Unable to delete the '{$tag->name}' tag: related tasks exist"
            ]);
        }
        $tag->delete();
        return response()->json([
            "message" => "Tag removed"
        ]);
    }
}
