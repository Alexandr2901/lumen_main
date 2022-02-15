<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\NewsRepositoryContract;
//use App\Http\Requests\News\StoreRequest;
use App\Contracts\Services\NewsServiceContract;
use App\Http\Requests\News\StoreRequest;
use App\Http\Requests\News\UpdateRequest;
use App\Http\Resources\NewsResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct(NewsRepositoryContract $newsRepository, NewsServiceContract $newsService)
    {
        $this->newsRepository = $newsRepository;
        $this->newsService = $newsService;

    }

    public function index()
    {
        return NewsResource::collection($this->newsRepository->all());
    }

    public function show(int $id)
    {
        return new NewsResource($this->newsRepository->find($id));
    }

    public function store(StoreRequest $request)
    {
        return new NewsResource($this->newsService->create(
            $request->validated(),
            $request->user()->id)
        );
    }

    public function update(int $id,UpdateRequest $request)
    {
        $this->authorize('update', $this->newsRepository->find($id));
        return $this->newsService->update($request->validated(),$id);
    }

    public function destroy(int $id)
    {
        $this->authorize('destroy', $this->newsRepository->find($id));
        return $this->newsRepository->destroy($id);
    }
}
