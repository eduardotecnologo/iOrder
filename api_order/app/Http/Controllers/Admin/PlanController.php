<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdatePlan;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        private $repository;
        public function __construct(Plan $plan){
            $this->repository = $plan;
        }

    public function index()
    {
        $plans = $this->repository->latest()->paginate();
        return view('admin.pages.plans.index',
        [
            'plans' => $plans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUpdatePlan $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('plans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $url
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();
        if(!$plan)
            return redirect()->back();
            return view('admin.pages.plans.show',[
                'plan' => $plan
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $url
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($url)
    {
            $plan = $this->repository->where('url',$url)->first();
            if(!$plan)
                return redirect()->back();

            return view('admin.pages.plans.edit', [
            'plan' => $plan
        ]);
    }

     /**
     * Show the form for search the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $plans = $this->repository->search($request->filter);
        return view('admin.pages.plans.index',[
            'plans'   => $plans,
            'filters' => $filters,
        ]);
        // dd($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $url
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreUpdatePlan $request, $url)
    {
        $plan = $this->repository->where('url', $url)->first();
        if(!$plan)
            return redirect()->back();
        $plan->update($request->all());
        return redirect()->route('plans.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($url)
    {
        $plan = $this->repository->where('url',$url)->first();
        if(!$plan)
            return redirect()->back();
            $plan->delete();
            return redirect()->route('plans.index');
    }
}
