<?php

namespace SisConPat\Http\Controllers;

use Illuminate\Http\Request;

use SisConPat\Http\Requests;
use SisConPat\Http\Controllers\Controller;
use SisConPat\Repositories\PlanRepository;
use SisConPat\Repositories\MemberRepository;

class PlansController extends Controller
{
    private $planRepository;

    public function __construct(PlanRepository $planRepository, MemberRepository $memberRepository)
    {
        $this->planRepository = $planRepository;
        $this->memberRepository = $memberRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $plans = $this->planRepository->allPlans();
        #dd($plans);
        return view('plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PlanRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $plan = $this->planRepository->storePlan($input);

        return redirect('plans');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $plan = $this->planRepository->findPlanById($id);
        $logs = $plan->revisionHistory;

        return view('plans.show', compact('plan', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $plan = $this->planRepository->findPlanById($id);
        
        return view('plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PlanRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $plan = $this->planRepository->findPlanById($id);
        $plan->update($input);

        return redirect('plans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->memberRepository->findMembersByPlanId($id)->count()>0)
        {
           return redirect('plans')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->planRepository->findPlanById($id)->delete();

        return redirect('plans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->planRepository->withTrashed()->findPlanById($id)->restore();

        return redirect('plans');
    }
}
