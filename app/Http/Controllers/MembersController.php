<?php

namespace SisConPat\Http\Controllers;

use Illuminate\Http\Request;
use File;

use JasperPHP\JasperPHP as JasperPHP;

use SisConPat\Http\Requests;
use SisConPat\Http\Controllers\Controller;
use SisConPat\Repositories\MemberStatusRepository;
use SisConPat\Repositories\MemberStatusReasonRepository;
use SisConPat\Repositories\RegionRepository;
use SisConPat\Repositories\CityRepository;
use SisConPat\Repositories\MemberRepository;
use SisConPat\Repositories\PlanRepository;
use SisConPat\Repositories\GenderRepository;
use SisConPat\Repositories\BankRepository;

class MembersController extends Controller
{
    private $memberRepository;

    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function search(RegionRepository $regionRepository, CityRepository $cityRepository, MemberStatusRepository $member_statusRepository, MemberStatusReasonRepository $member_status_reasonRepository, PlanRepository $planRepository, GenderRepository $genderRepository, BankRepository $bankRepository)
    { 
        session()->forget('srch_member_code');
        session()->forget('srch_member_cpf');
        session()->forget('srch_member_name');
        session()->forget('srch_member_plan_id');
        session()->forget('srch_member_gender_id');
        session()->forget('srch_member_region_id');
        session()->forget('srch_member_city_id');
        session()->forget('srch_member_status_id');
        session()->forget('srch_member_status_reason_id');

        $regions = array(''=>'') + $regionRepository
            ->allRegions()
            ->lists('description', 'id')
            ->all();

        $cities = array(''=>'') + $cityRepository
            ->allCities()
            ->lists('description', 'id')
            ->all();

        $member_statuses = array(''=>'') + $member_statusRepository
            ->allMemberStatuses()
            ->lists('description', 'id')
            ->all();

        $member_status_reasons = array(''=>'') + $member_status_reasonRepository
            ->allMemberStatusReasons()
            ->lists('description', 'id')
            ->all();

        $plans = array(''=>'') + $planRepository
            ->allPlans()
            ->lists('description', 'id')
            ->all();

        $genders = array(''=>'') + $genderRepository
            ->allGenders()
            ->lists('description', 'id')
            ->all();

        $banks = array(''=>'') + $bankRepository
            ->allBanks()
            ->lists('description', 'id')
            ->all();

        return view('members.search', compact('regions', 'cities', 'member_statuses', 'member_status_reasons', 'plans', 'genders', 'banks'));
    }

    public function search_results(Requests\MemberSearchRequest $request)
    { 
        $input = $request->all();

        $request->flash();

        session(['srch_member_code' => $input['srch_member_code']]);
        session(['srch_member_cpf' => $input['srch_member_cpf']]);
        session(['srch_member_name' => $input['srch_member_name']]);
        session(['srch_member_plan_id' => $input['srch_member_plan_id']]);
        session(['srch_member_gender_id' => $input['srch_member_gender_id']]);
        session(['srch_member_region_id' => $input['srch_member_region_id']]);
        session(['srch_member_city_id' => $input['srch_member_city_id']]);
        session(['srch_member_status_id' => $input['srch_member_status_id']]);
        session(['srch_member_status_reason_id' => $input['srch_member_status_reason_id']]);

        $members = $this->memberRepository->searchMembers();

        return view('members.search_results', compact('members'));
    }

    public function search_results_back()
    { 
        $members = $this->memberRepository->searchMembers();

        return view('members.search_results', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(CityRepository $cityRepository, MemberStatusRepository $member_statusRepository, MemberStatusReasonRepository $member_status_reasonRepository, PlanRepository $planRepository, GenderRepository $genderRepository, BankRepository $bankRepository)
    { 
        $cities = array(''=>'') + $cityRepository
            ->allCities()
            ->lists('description', 'id')
            ->all();

        $member_statuses = array(''=>'') + $member_statusRepository
            ->allMemberStatuses()
            ->lists('description', 'id')
            ->all();

        $member_status_reasons = $member_status_reasonRepository
            ->allMemberStatusReasons()
            ->lists('description', 'id')
            ->all();

        $plans = array(''=>'') + $planRepository
            ->allPlans()
            ->lists('description', 'id')
            ->all();

        $genders = array(''=>'') + $genderRepository
            ->allGenders()
            ->lists('description', 'id')
            ->all();

        $banks = array(''=>'') + $bankRepository
            ->allBanks()
            ->lists('description', 'id')
            ->all();

        return view('members.create', compact('cities', 'member_statuses', 'member_status_reasons', 'plans', 'genders', 'banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\MemberRequest $request)
    {
        $input = $request->all();

        $input['name'] = strtoupper($input['name']);
        $input['address'] = strtoupper($input['address']);
        $input['neighborhood'] = strtoupper($input['neighborhood']);
        $input['comments'] = strtoupper($input['comments']);

        if($input['birthday'])
        {
            $input['birthday'] = \DateTime::createFromFormat('d/m/Y', $input['birthday']);
            $input['birthday'] = $input['birthday']->format('Y-m-d');
        }
        else
        {
            $input['birthday'] = null;
        }

        $input['date_aafc_ini'] = \DateTime::createFromFormat('d/m/Y', $input['date_aafc_ini']);
        $input['date_aafc_ini'] = $input['date_aafc_ini']->format('Y-m-d');

        if($input['date_aafc_fim'])
        {
            $input['date_aafc_fim'] = \DateTime::createFromFormat('d/m/Y', $input['date_aafc_fim']);
            $input['date_aafc_fim'] = $input['date_aafc_fim']->format('Y-m-d');
        }
        else
        {
            $input['date_aafc_fim'] = null;
        }
        
        $member = $this->memberRepository->storeMember($input);
        
        $member = $this->memberRepository->allMembersById()->last();
        #$logs = $member->revisionHistory;
        
        return redirect()->route('members.show', ['id' => $member->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $member = $this->memberRepository->findMemberById($id);
        
        $logs = $member->revisionHistory;
        
        return view('members.show', compact('member', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, CityRepository $cityRepository, MemberStatusRepository $member_statusRepository, MemberStatusReasonRepository $member_status_reasonRepository, PlanRepository $planRepository, GenderRepository $genderRepository, BankRepository $bankRepository)
    { 
        $cities = $cityRepository
            ->allCities()
            ->lists('description', 'id')
            ->all();

        $member_statuses = $member_statusRepository
            ->allMemberStatuses()
            ->lists('description', 'id')
            ->all();

        $member_status_reasons = $member_status_reasonRepository
            ->allMemberStatusReasons()
            ->lists('description', 'id')
            ->all();

        $plans = $planRepository
            ->allPlans()
            ->lists('description', 'id')
            ->all();

        $genders = $genderRepository
            ->allGenders()
            ->lists('description', 'id')
            ->all();

        $banks = $bankRepository
            ->allBanks()
            ->lists('description', 'id')
            ->all();
        
        $member = $this->memberRepository->findMemberById($id);

        return view('members.edit', compact('member', 'cities', 'member_statuses', 'member_status_reasons', 'plans', 'genders', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\MemberRequest $request, $id)
    {
        $input = $request->all();

        $input['name'] = strtoupper($input['name']);
        $input['address'] = strtoupper($input['address']);
        $input['neighborhood'] = strtoupper($input['neighborhood']);
        $input['comments'] = strtoupper($input['comments']);

        #dd($input['comments']);

        if($input['birthday'])
        {
            $input['birthday'] = \DateTime::createFromFormat('d/m/Y', $input['birthday']);
            $input['birthday'] = $input['birthday']->format('Y-m-d');
        }
        else
        {
            $input['birthday'] = null;
        }

        if($input['date_aafc_ini'])
        {
            $input['date_aafc_ini'] = \DateTime::createFromFormat('d/m/Y', $input['date_aafc_ini']);
            $input['date_aafc_ini'] = $input['date_aafc_ini']->format('Y-m-d');
        }
        else
        {
            $input['date_aafc_ini'] = null;
        }

        if($input['date_aafc_fim'])
        {
            $input['date_aafc_fim'] = \DateTime::createFromFormat('d/m/Y', $input['date_aafc_fim']);
            $input['date_aafc_fim'] = $input['date_aafc_fim']->format('Y-m-d');
        }
        else
        {
            $input['date_aafc_fim'] = null;
        }
        
        #dd($input);

        $member = $this->memberRepository->findMemberById($id);
        $member->update($input);

        #$logs = $member->revisionHistory;
        
        return redirect()->route('members.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->memberRepository->findMemberById($id)->delete();

        return redirect('members');
    }

    public function city($id)
    {
        $members = $this->memberRepository->findMembersByCityId($id);
        
        return response()->json($members);
    }
}