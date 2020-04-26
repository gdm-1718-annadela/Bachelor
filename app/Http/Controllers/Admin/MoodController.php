<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Mood\BulkDestroyMood;
use App\Http\Requests\Admin\Mood\DestroyMood;
use App\Http\Requests\Admin\Mood\IndexMood;
use App\Http\Requests\Admin\Mood\StoreMood;
use App\Http\Requests\Admin\Mood\UpdateMood;
use App\Models\Mood;
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

class MoodController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMood $request
     * @return array|Factory|View
     */
    public function index(IndexMood $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Mood::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'mood', 'picturetitle', 'picturepath'],

            // set columns to searchIn
            ['id', 'mood', 'picturetitle', 'picturepath']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.mood.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.mood.create');

        return view('admin.mood.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMood $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMood $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Mood
        $mood = Mood::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/moods'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/moods');
    }

    /**
     * Display the specified resource.
     *
     * @param Mood $mood
     * @throws AuthorizationException
     * @return void
     */
    public function show(Mood $mood)
    {
        $this->authorize('admin.mood.show', $mood);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Mood $mood
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Mood $mood)
    {
        $this->authorize('admin.mood.edit', $mood);


        return view('admin.mood.edit', [
            'mood' => $mood,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMood $request
     * @param Mood $mood
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMood $request, Mood $mood)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Mood
        $mood->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/moods'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/moods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMood $request
     * @param Mood $mood
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMood $request, Mood $mood)
    {
        $mood->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMood $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMood $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Mood::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
