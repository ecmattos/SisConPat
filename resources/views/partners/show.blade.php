@extends('home')

@section('content')

  <div class="page-header text-primary">
    <h4>
      <a href="{!! route('dashboard.pc_partners') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Ir para Painel Controle Associados"><i class="fa fa-sitemap"></i></a>
      Parceiros: Consulta
      <div class="btn-group btn-group-sm pull-right">
        <a href="{!! route('partners.search_results_back') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Voltar Resultados"><i class="fa fa-bars"></i></a>
        <a href="{!! route('partners.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
        <a href="{!! route('partners.edit', ['id' => $partner->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
        <a href="{!! route('partners') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        <a href="javascript:;" onclick="onDestroy('{!! route('partners.destroy', [$partner->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red" rel="tooltip" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a>
      </div>
    </h4>
    <hr class="hr-primary" />
  </div>

  <div class="col-sm-8">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title"><b>{{ $partner->name }}</b></h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              
            </thead>
            <tbody>
              <tr>
                <td class="text-right" width="25%">Tipo</td>
                <td class="text-left">{{ $partner->partner_type->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Endereço</td>
                <td class="text-left">{{ $partner->address }}</td>
              </tr>

              <tr>
                <td class="text-right">Bairro</td>
                <td class="text-left">{{ $partner->neighborhood }}</td>
              </tr>

              <tr>
                <td class="text-right">Cidade</td>
                <td class="text-left">{{ $partner->city->description }} / {{ $partner->city->state->code }}</td>
              </tr>

              <tr>
                <td class="text-right">CEP</td>
                <td class="text-left">{{ $partner->zip_code_mask }}</td>
              </tr>

              <tr>
                <td class="text-right">Região</td>
                <td class="text-left">{{ $partner->city->region->description }} ({{ $partner->city->region->code }})</td>
              </tr>

              <tr>
                <td class="text-right">Telefone</td>
                <td class="text-left">{{ $partner->phone_mask }}</td>
              </tr>

              <tr>
                <td class="text-right">Celular</td>
                <td class="text-left">{{ $partner->mobile_mask }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    @include('revisionable.logs_register')
  </div>
    
@endsection