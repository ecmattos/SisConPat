@extends('home')

@section('content')

	<div class="page-header text-primary">
   	<h4>
     	Fornecedores: Consulta
     	<div class="btn-group btn-group-sm pull-right">
     		<a href="{!! route('providers.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
     		<a href="{!! route('providers.edit', ['id' => $provider->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
     		<a href="{!! route('providers') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        <a href="{!! route('providers') !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
    	</div>
   	</h4>
   	<hr class="hr-primary" />
  </div>

  <div class="col-sm-8">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title"><b>{{ $provider->cnpj_mask }} - {{ $provider->description }}</b></h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              
            </thead>
            <tbody>
              <tr>
                <td class="text-right" width="25%">Nome Fantasia</td>
                <td class="text-left">{{ $provider->description_short }}</td>
              </tr>
              
              <tr>
                <td class="text-right">Endereço</td>
                <td class="text-left">{{ $provider->address }}</td>
              </tr>

              <tr>
                <td class="text-right">Bairro</td>
                <td class="text-left">{{ $provider->neighborhood }}</td>
              </tr>

              <tr>
                <td class="text-right">Cidade</td>
                <td class="text-left">{{ $provider->city->description }} / {{ $provider->city->state->code }}</td>
              </tr>

              <tr>
                <td class="text-right">CEP</td>
                <td class="text-left">{{ $provider->zip_code_mask }}</td>
              </tr>

              <tr>
                <td class="text-right">Telefone</td>
                <td class="text-left">{{ $provider->phone_mask }}</td>
              </tr>

              <tr>
                <td class="text-right">Celular</td>
                <td class="text-left">{{ $provider->mobile_mask }}</td>
              </tr>

              <tr>
                <td class="text-right">E-mail</td>
                <td class="text-left">{{ $provider->email }}</td>
              </tr>

              <tr>
                <td class="text-right">Observações</td>
                <td class="text-left">{{ $provider->comments }}</td>
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
  