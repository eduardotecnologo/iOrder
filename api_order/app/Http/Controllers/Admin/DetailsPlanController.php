<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailsPlan;
use App\Models\Plan;
use http\Client\Request;

class DetailsPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailsPlan $detailsPlan, Plan $plan){
        $this->repository = $detailsPlan;
        $this->plan = $plan;
    }

    public function index($urlPlan){
        if(!$plan = $this->plan->where('url', $urlPlan)->first()){
            return redirect()->back();
        }

        //$details = $plan->details();
        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'plan'    => $plan,
            'details' => $details
        ]);
    }

    public function create($urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.create', [
            'plan' => $plan,
        ]);
    }

        public function store(Request $request){
        dd($request->all());
    }
}
