@extends('home')

@section('content')

	<div class="page-header text-primary">
   	<h4>
     	Unidade Gestoras: Consulta
     	<div class="btn-group btn-group-sm pull-right">
     		<a href="{!! route('management_units.search_results_back') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Resultados"><i class="fa fa-bars"></i></a>
        <a href="{!! route('management_units.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
     		<a href="{!! route('management_units.edit', ['id' => $management_unit->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
     		<a href="{!! route('management_units') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        <a href="{!! route('management_units') !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
    	</div>
   	</h4>
   	<hr class="hr-primary" />
  </div>

  <div class="col-sm-8">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title"><b>{{ $management_unit->code }} - {{ $management_unit->description }}</b></h3>
        <span class="pull-right panel-clickable"><i class="fa fa-chevron-up"></i></span>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              
            </thead>
            <tbody>
              <tr>
                <td class="text-right" width="25%">Filial</td>
                <td class="text-left">{{ $management_unit->region->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Endereço</td>
                <td class="text-left">{{ $management_unit->address }}</td>
              </tr>

              <tr>
                <td class="text-right">Bairro</td>
                <td class="text-left">{{ $management_unit->neighborhood }}</td>
              </tr>

              <tr>
                <td class="text-right">Cidade</td>
                <td class="text-left">{{ $management_unit->city->description }} / {{ $management_unit->city->state->code }}</td>
              </tr>

              <tr>
                <td class="text-right">CEP</td>
                <td class="text-left">{{ $management_unit->zip_code_mask }}</td>
              </tr>

              <tr>
                <td class="text-right">Telefone</td>
                <td class="text-left">{{ $management_unit->phone_mask }}</td>
              </tr>

              <tr>
                <td class="text-right">Celular</td>
                <td class="text-left">{{ $management_unit->mobile_mask }}</td>
              </tr>

              <tr>
                <td class="text-right">E-mail</td>
                <td class="text-left">{{ $management_unit->email }}</td>
              </tr>

              <tr>
                <td class="text-right">Observações</td>
                <td class="text-left">{{ $management_unit->comments }}</td>
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

  <div class="col-sm-12">
    @include('management_units.patrimonials')
  </div> 
    
@endsection

@section('js_scripts')
  <script type="text/javascript">
    $(document).on('click', '.panel-heading span.panel-clickable', function(e)
      {
          var $this = $(this);
        if(!$this.hasClass('panel-collapsed')) 
          {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('fa fa-chevron-up').addClass('fa fa-chevron-down');
          } 
        else 
          {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('fa fa-chevron-down').addClass('fa fa-chevron-up');
          }
      })
  </script>
@endsection
  