<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Story\BulkDestroyStory;
use App\Http\Requests\Admin\Story\DestroyStory;
use App\Http\Requests\Admin\Story\IndexStory;
use App\Http\Requests\Admin\Story\StoreStory;
use App\Http\Requests\Admin\Story\UpdateStory;
use App\Models\Story;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class StoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexStory $request
     * @return array|Factory|View
     */
    public function index(IndexStory $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Story::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'user_id', 'category_id', 'mood_id', 'type_id'],

            // set columns to searchIn
            ['id', 'title', 'text']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.story.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.story.create');

        return view('admin.story.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStory $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreStory $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Story
        $story = Story::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/stories'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/stories');
    }

    /**
     * Display the specified resource.
     *
     * @param Story $story
     * @throws AuthorizationException
     * @return void
     */
    public function show(Story $story)
    {
        $this->authorize('admin.story.show', $story);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Story $story
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Story $story)
    {
        $this->authorize('admin.story.edit', $story);


        return view('admin.story.edit', [
            'story' => $story,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStory $request
     * @param Story $story
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateStory $request, Story $story)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Story
        $story->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/stories'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/stories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyStory $request
     * @param Story $story
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyStory $request, Story $story)
    {
        $story->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyStory $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyStory $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Story::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
