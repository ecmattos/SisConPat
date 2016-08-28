@extends('home')

@section('content')

	<div class="page-header text-primary">
        <h4>
            <i class="fa fa-users"></i> 
            Associados - Painel de controle
            <div class="btn-group btn-group-sm pull-right">
                <a href="{!! route('dashboard.pc_partners') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Ir para Painel Controle Parceiros"><i class="fa fa-sitemap"></i></a>
                |
                <a href="{!! route('members.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
                <a href="{!! route('members') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>            
            </div>
        </h4>
        <hr class="hr-primary" />
    </div>

    <div class="row-fluid">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <a href="{!! route('dashboard.members', ['plan_id' => 1, 'status_id' => 2]) !!}"><i class='fa fa-2x fa-eye'></i></a> 
            <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByPlanStatus', 'plan_id' => 1, 'status_id' => 2]) !!}"><i class='fa fa-2x fa-tag'></i></a>
            <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByPlanStatus', 'plan_id' => 1, 'status_id' => 2]) !!}"><i class='fa fa-2x fa-print'></i></a>
            <div class="offer offer-radius offer-primary">
                <div class="shape">
                    <div class="shape-text">
                        {{ $plan1->code }}                              
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        <i class="fa fa-users">{{ $plan1_allmembersbystatus->count() }}</i>
                        <i class="fa fa-male">{{ $plan1_allmembersmalebystatus->count() }}</i>
                        <i class="fa fa-female">{{ $plan1_allmembersfemalebystatus->count() }}</i>
                        <i class="fa fa-envelope">{{ $plan1_allmembersemailbystatus->count() }}</i>
                    </h3>                       
                    <p>
                        Sócios Patrimônios
                    </p>
                </div>
            </div>
            
            @foreach($plan1_regions as $region)
                @if ($region->members->count() >= 0)
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <small>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1_<?php echo $region->id;?>" aria-expanded="false"><i class="indicator glyphicon glyphicon-chevron-down"></i></a>
                                        {{ $region->description }} 
                                    </small>
                                    <div class="pull-right">
                                        <small>
                                            {{ $region->members->count() }} ({{ number_format(100*($region->members->count()/$plan1_allmembersbystatus->count()), 0) }}%)
                                        </small>
                                        <a href="{!! route('dashboard.members', ['plan_id' => 1, 'region_id' => $region->id, 'status_id' => 2]) !!}"><i class='fa fa-eye'></i></a> | 
                                        <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByPlanRegionStatus', 'plan_id' => 1, 'region_id' => $region->id, 'status_id' => 2]) !!}"><i class='fa fa-tag'></i></a> | 
                                        <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByPlanRegionStatus', 'plan_id' => 1, 'region_id' => $region->id, 'status_id' => 2]) !!}"><i class='fa fa-print'></i></a>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse1_<?php echo $region->id;?>" class="panel-collapse collapse">
                                @foreach($plan1_cities as $city)
                                    @if($city->region_id == $region->id)
                                        @if($city->members->count()>0)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ 100*($city->members->count()/$region->members->count()) }}%">
                                                </div>
                                                <span class="progress-type">{{ $city->description }} / {{ $city->state->code }}</span>
                                                <span class="progress-completed">{{ $city->members->count() }} ({{ number_format(100*($city->members->count()/$region->members->count()), 0) }}%) 
                                                    <a href="{!! route('dashboard.members', ['plan_id' => 1, 'city_id' => $city->id, 'status_id' => 2]) !!}"><i class='fa fa-eye'></i></a> | 
                                                    <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByPlanCityStatus', 'plan_id' => 1, 'city_id' => $city->id, 'status_id' => 2]) !!}"><i class='fa fa-tag'></i></a> | 
                                                    <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByPlanCityStatus', 'plan_id' => 1, 'city_id' => $city->id, 'status_id' => 2]) !!}"><i class='fa fa-print'></i></a></span>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="row-fluid">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <a href="{!! route('dashboard.members', ['plan_id' => 2, 'status_id' => 2]) !!}"><i class='fa fa-2x fa-eye'></i></a> 
            <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByPlanStatus', 'plan_id' => 2, 'status_id' => 2]) !!}"><i class='fa fa-2x fa-tag'></i></a>
            <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByPlanStatus', 'plan_id' => 2, 'status_id' => 2]) !!}"><i class='fa fa-2x fa-print'></i></a>
            <div class="offer offer-radius offer-primary">
                <div class="shape">
                    <div class="shape-text">
                        {{ $plan2->code }}                              
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        <i class="fa fa-users">{{ $plan2_allmembersbystatus->count() }}</i>
                        <i class="fa fa-male">{{ $plan2_allmembersmalebystatus->count() }}</i>
                        <i class="fa fa-female">{{ $plan2_allmembersfemalebystatus->count() }}</i>
                        <i class="fa fa-envelope">{{ $plan2_allmembersemailbystatus->count() }}</i>
                    </h3>                       
                    <p>
                        Sócios Patrimônios
                    </p>
                </div>
            </div>
            
            @foreach($plan2_regions as $region)
                @if ($region->members->count() >= 0)
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <small>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2_<?php echo $region->id;?>" aria-expanded="false"><i class="indicator glyphicon glyphicon-chevron-down"></i></a>
                                        {{ $region->description }} 
                                    </small>
                                    <div class="pull-right">
                                        <small>
                                            {{ $region->members->count() }} ({{ number_format(100*($region->members->count()/$plan2_allmembersbystatus->count()), 0) }}%)
                                        </small>
                                        <a href="{!! route('dashboard.members', ['plan_id' => 2, 'region_id' => $region->id, 'status_id' => 2]) !!}"><i class='fa fa-eye'></i></a> | <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByPlanRegionStatus', 'plan_id' => 2, 'region_id' => $region->id, 'status_id' => 2]) !!}"><i class='fa fa-tag'></i></a> | <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByPlanRegionStatus', 'plan_id' => 2, 'region_id' => $region->id, 'status_id' => 2]) !!}"><i class='fa fa-print'></i></a>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse2_<?php echo $region->id;?>" class="panel-collapse collapse">
                                @foreach($plan2_cities as $city)
                                    @if($city->region_id == $region->id)
                                        @if($city->members->count()>0)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ 100*($city->members->count()/$region->members->count()) }}%">
                                                </div>
                                                <span class="progress-type">{{ $city->description }} / {{ $city->state->code }}</span>
                                                <span class="progress-completed">{{ $city->members->count() }} ({{ number_format(100*($city->members->count()/$region->members->count()), 0) }}%) 
                                                <a href="{!! route('dashboard.members', ['plan_id' => 2, 'city_id' => $city->id, 'status_id' => 2]) !!}"><i class='fa fa-eye'></i></a> | 
                                                <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByPlanCityStatus', 'plan_id' => 2, 'city_id' => $city->id, 'status_id' => 2]) !!}"><i class='fa fa-tag'></i></a> | 
                                                <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByPlanCityStatus', 'plan_id' => 2, 'city_id' => $city->id, 'status_id' => 2]) !!}"><i class='fa fa-print'></i></a></span>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="row-fluid">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <a href="{!! route('dashboard.members', ['status_id' => 2]) !!}"><i class='fa fa-2x fa-eye'></i></a> 
            <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByStatus', 'status_id' => 2]) !!}"><i class='fa fa-2x fa-tag'></i></a>
            <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByStatus', 'status_id' => 2]) !!}"><i class='fa fa-2x fa-print'></i></a>
            <div class="offer offer-radius offer-primary">
                <div class="shape">
                    <div class="shape-text">
                        {{ $plan1->code }}+{{ $plan2->code }}                               
                    </div>
                </div>
                <div class="offer-content">
                    <h3 class="lead">
                        <i class="fa fa-users">{{ $plan1_allmembersbystatus->count() + $plan2_allmembersbystatus->count() }}</i>
                        <i class="fa fa-male">{{ $plan1_allmembersmalebystatus->count() + $plan2_allmembersmalebystatus->count() }}</i>
                        <i class="fa fa-female">{{ $plan1_allmembersfemalebystatus->count() + $plan2_allmembersfemalebystatus->count() }}</i>
                        <i class="fa fa-envelope">{{ $plan1_allmembersemailbystatus->count() + $plan2_allmembersemailbystatus->count() }}</i>
                    </h3>                       
                    <p>
                        Sócios Patrimônios
                    </p>
                </div>
            </div>
            
            @foreach($plan_regions as $region)
                @if ($region->members->count() >= 0)
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <small>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $region->id;?>" aria-expanded="false"><i class="indicator glyphicon glyphicon-chevron-down"></i></a>
                                        {{ $region->description }} 
                                    </small>
                                    <div class="pull-right">
                                        <small>
                                            {{ $region->members->count() }} ({{ number_format(100*($region->members->count()/($plan1_allmembersbystatus->count() + $plan2_allmembersbystatus->count())), 0) }}%)
                                        </small>
                                        <a href="{!! route('dashboard.members', ['region_id' => $region->id, 'status_id' => 2]) !!}"><i class='fa fa-eye'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByRegionStatus', 'city_id' => $city->id, 'status_id' => 2]) !!}"><i class='fa fa-tag'></i></a> 
                                        | 
                                        <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByRegionStatus', 'region_id' => $region->id, 'status_id' => 2]) !!}"><i class='fa fa-print'></i></a>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse_<?php echo $region->id;?>" class="panel-collapse collapse">
                                @foreach($plan_cities as $city)
                                    @if($city->region_id == $region->id)
                                        @if($city->members->count()>0)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ 100*($city->members->count()/$region->members->count()) }}%">
                                                </div>
                                                <span class="progress-type">{{ $city->description }} / {{ $city->state->code }}</span>
                                                <span class="progress-completed">{{ $city->members->count() }} ({{ number_format(100*($city->members->count()/$region->members->count()), 0) }}%) 
                                                    <a href="{!! route('dashboard.members', ['city_id' => $city->id, 'status_id' => 2]) !!}"><i class='fa fa-eye'></i></a> | 
                                                    <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByCityStatus', 'city_id' => $city->id, 'status_id' => 2]) !!}"><i class='fa fa-tag'></i></a> | 
                                                    <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByCityStatus', 'city_id' => $city->id, 'status_id' => 2]) !!}"><i class='fa fa-print'></i></a>
                                                </span>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection

@section('js_scripts')
    <script type="text/javascript">
        function toggleChevron(e) 
            {
                $(e.target)
                .prev('.panel-heading')
                .find("i.indicator")
                .toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
            }
        $('#accordion').on('hidden.bs.collapse', toggleChevron);
        $('#accordion').on('shown.bs.collapse', toggleChevron);
    </script>
@endsection