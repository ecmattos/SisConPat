@extends('home')

@section('content')
  <div class="page-header">
    <div class="row">
      <h3 class="pull-left">Usuários - Consulta</h3>
    </div>
    <div class="btn-group btn-group-sm">
      <div class="pull-left">
          <a href="{!! route('users.create') !!}" type="button" class="btn btn-xs btn-primary" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
          <a href="{!! route('users.edit', ['id' => $user->id]) !!}" type="button" class="btn btn-xs btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
          <a href="{!! route('users.copy', ['id'=>$user->id]) !!}" type="button" class="btn btn-xs btn-primary" rel="tooltip" title="Copiar"><i class="fa fa-copy"></i></a>
          <a href="{!! route('users') !!}" type="button" class="btn btn-xs btn-primary" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-8">
      <div class="table-responsive">
      	<table class="table table-bordered table-striped">
          <thead>
           	<th class="text-center" colspan="2"><h4><b>{{ $user->code }} - {{ $user->description }}</b></h4></th>
          </thead>
          <tbody>
          	<tr>
           		<td class="text-right" width="25%">Tipo</td>
           		<td class="text-left">{{ $user->user_type->description }}</td>
            </tr>

        		<tr>
             	<td class="text-right">Especificações</td>
             	<td class="text-left">{{ $user->mat_especificacao }}</td>
           	</tr>

        		<tr>
             	<td class="text-right">Referências</td>
             	<td class="text-left">{{ $user->mat_referencia }}</td>
           	</tr>

        		<tr>
             	<td class="text-right">Classe</td>
             	<td class="text-left">{{ $user->user_group->description }}</td>
           	</tr>

        		<tr>
             	<td class="text-right">Situação</td>
             	<td class="text-left">{{ $user->user_status->description }}</td>
           	</tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-sm-4">
    </div>
  </div>

  <div class="row">
    <ul class="nav nav-tabs; ?>" style="margin-bottom: 1px;">
      <li class="active"><a href="#almoxarifados" data-toggle="tab"><b>ALMOXARIFADOS</b></a></li>
      <li><a href="#compras" data-toggle="tab"><b>COMPRAS</b></a></li>
      <li><a href="#nmms" data-toggle="tab"><b>MOVIMENTAÇÃO</b></a></li>
      <li><a href="#pss" data-toggle="tab"><b>PREST.SERVIÇOS</b></a></li>
      <li><a href="#componentes" data-toggle="tab"><b>COMPONENTES</b></a></li>
      <li><a href="#equiptos" data-toggle="tab"><b>EQUIPAMENTOS</b></a></li>
      <li><a href="#contratos" data-toggle="tab"><b>CONTRATOS</b></a></li>
    </ul>

    <div id="matTabContent" class="tab-content">
      <div class="tab-pane fade active in" id="almoxarifados">
        <?php #include './views/materiais/matconsestoque.php'; ?>
      </div>
      <div class="tab-pane fade" id="compras">
        <?php #include './views/materiais/matconsscm.php'; ?>
      </div>
      <div class="tab-pane fade" id="nmms">
        <?php #include './views/materiais/matconsnmm.php'; ?>
      </div>
      <div class="tab-pane fade" id="pss">
        <?php #include './views/materiais/matcons_pspesqqry.php'; ?>
      </div>
      <div class="tab-pane fade" id="componentes">
        <?php #include './views/materiais/matconsequiptos.php'; ?>
      </div>
      <div class="tab-pane fade" id="equiptos">
        <?php #include './views/materiais/matequiptopesqqry.php'; ?>
      </div>
      <div class="tab-pane fade" id="contratos">
        <?php #include './views/materiais/matcopesqqry.php'; ?>
      </div>
    </div>
  </div>
@endsection