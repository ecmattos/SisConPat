<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ceasa - SisConPat</title>

	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap-dialog.min.css') }}" rel="stylesheet">

	<link href="{{ asset('css/#BootSideMenu.css') }}" rel="stylesheet">

	<link href="{{ asset('css/bootstrap-table.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap-switch.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/Xbootstrap-datepicker3.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/ekko-lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/checkbox_radio.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/print.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<div class="navbar navbar-fixed-top navbar-default">
  		<div class="container-fluid">
  			<div class="navbar-header">
    			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    				<span class="sr-only"></span>
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    			</button>
    			<a class="brand" href="{{ url('/') }}"><img src="{{ url('img/ceasa_logo.png') }}" class="img-responsive" width="50"></a>
	   		</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				@if(!Auth::guest())
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/management_units/') }}">Unidades Gestoras</a></li>
					</ul>
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/providers/') }}">Fornecedores</a></li>
					</ul>
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/patrimonials/') }}">Patrimônios</a></li>
					</ul>
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/materials/') }}">Materiais</a></li>
					</ul>
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/services/') }}">Serviços</a></li>
					</ul>
					<ul class="nav navbar-nav">
						<li class="dropdown dropdown-large">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Relatórios <b class="caret"></b></a>
								<ul class="dropdown-menu dropdown-menu-large row">
									<li class="col-sm-12">
										<ul>
											<li class="dropdown-header">Patrimônios</li>
											<li><a href="{{ url('/patrimonials_reports_purchases/') }}">Aquisições</a></li>
										</ul>
									</li>
								</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav">
						<li class="dropdown dropdown-large">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Administração <b class="caret"></b></a>
								<ul class="dropdown-menu dropdown-menu-large row">
									<li class="col-sm-4">
										<ul>
											<li class="dropdown-header">Patrimônios</li>
											<li><a href="{{ url('/patrimonial_types/') }}">Tipos</a></li>
											<li><a href="{{ url('/patrimonial_sub_types/') }}">Sub-tipos</a></li>
											<li><a href="{{ url('/patrimonial_sectors/') }}">Setores</a></li>
											<li><a href="{{ url('/patrimonial_sub_sectors/') }}">Sub-setores</a></li>
											<li><a href="{{ url('/patrimonial_brands/') }}">Marcas</a></li>
											<li><a href="{{ url('/patrimonial_models/') }}">Modelos</a></li>
										</ul>
										<ul>
											<li class="dropdown-header">Materiais</li>
											<li><a href="{{ url('/material_units/') }}">Unidades</a></li>
										</ul>
									</li>

									<li class="col-sm-4">
										<ul>
											<li class="dropdown-header">Localidades</li>
											<li><a href="{{ url('/regions/') }}">Regiões</a></li>
											<li><a href="{{ url('/states/') }}">Estados</a></li>
											<li><a href="{{ url('/cities/') }}">Cidades</a></li>
										</ul>
										<ul>
											<li class="dropdown-header">Segurança</li>
											<li><a href="{{ url('/users/') }}">Usuários</a></li>
											<li><a href="{{ url('/roles/') }}">Grupos</a></li>
										</ul>
									</li>

									<li class="col-sm-4">
										<ul>
											<li class="dropdown-header">Financeiro</li>
											<li><a href="{{ url('/accounting_accounts/') }}">Plano Contas</a></li>
											<li><a href="{{ url('/balance_sheets/') }}">Balancetes</a></li>
											<li><a href="{{ url('/balance_sheet_previouses/') }}">Saldos iniciais</a></li>
										</ul>
									</li>
								</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Sair</a></li>
							</ul>
						</li>
					</ul>
				@endif
			</div>
		</div>
	</div>

	<section>
		<!-- Page Content -->
	    <div class="container-fluid">
	    	
	    	<div class="row-fluid">
		      	<div class="col-sm-12">
		      		@if (Auth::guest())
						@include('users.no_users')
					@else
						@include('common.flash')
						@yield('content')
					@endif
		      	</div>
			</div>

			<div class="row-fluid">
		      	<div class="col-sm-12">
		      		@include('common.footer')
		    	</div>
			</div>


			<!-- Modal -->
			<div class="modal fade" id="LoginModal" role="dialog">
				<div class="modal-dialog">
			    	<!-- Modal content-->
			      	<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
				      	<div class="modal-content">
				        	<div class="modal-header">
				          		<button type="button" class="close" data-dismiss="modal">&times;</button>
				          		<h4 class="modal-title">SisConPat: Informe suas credênciais</h4>
				        	</div>
				        	<div class="modal-body">
				          		<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="col-xs-offset-5 col-xs-2">
									<img src="{{ url('img/ceasa_logo.png') }}" class="img-responsive" width="100">
								</div>
								<div class="form-group">
									<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
										<div class="input-group input-group-sm">
									  		<span class="input-group-addon"><i class="fa fa-user"></i></span>
									  		<input type="text" class="form-control" name="name" value="{{ old('name') }}">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
										<div class="input-group input-group-sm">
											<span class="input-group-addon"><i class="fa fa-lock"></i></span>
											<input type="password" class="form-control" name="password">
										</div>
									</div>
								</div>
							</div>
				        	<div class="modal-footer">
				          		<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
									<button type="submit" class="btn btn-block btn-primary btn-submit">Entrar <i class="fa fa-sign-in"></i></button>
								</div>
				        	</div>
			      		</div>
			      	</form>
			    </div>
			</div>

			<div class="modal fade" id="RegisterModal" role="dialog">
				<div class="modal-dialog">
			    	<!-- Modal content-->
			      	<div class="modal-content">
			        	<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
				        	<div class="modal-header">
				          		<button type="button" class="close" data-dismiss="modal">&times;</button>
				          		<h4 class="modal-title">SisConPat: Registre-se aqui</h4>
				        	</div>
				        	<div class="modal-body">
			          			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			          			<div class="col-xs-offset-5 col-xs-2">
									<img src="{{ url('img/ceasa_logo.png') }}" class="img-responsive" width="100">
								</div>
								<div class="form-group">
									<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
										<div class="input-group input-group-sm">
									  		<span class="input-group-addon"><i class="fa fa-user"></i></span>
									  		<input type="text" class="form-control" name="name" value="" placeholder="Usuário">
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
										<div class="input-group input-group-sm">
									  		<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									  		<input type="email" class="form-control" name="email" value="" placeholder="e-mail">
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
										<div class="input-group input-group-sm">
									  		<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									  		<input type="password" class="form-control" name="password" value="" placeholder="Senha">
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
										<div class="input-group input-group-sm">
									  		<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									  		<input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar senha">
										</div>
									</div>
								</div>
							</div>
				        	<div class="modal-footer">
				          		<div class="form-group">
									<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
										<button type="submit" class="btn btn-block btn-primary btn-submit">Enviar <i class="fa fa-sign-in"></i></button>
									</div>
								</div>
				        	</div>
				        </form>
			      	</div>
			    </div>
			</div>

			<div class="modal fade" id="ResetPasswordModal" role="dialog">
				<div class="modal-dialog">
			    	<!-- Modal content-->
			      	<div class="modal-content">
			        	<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
				        	<div class="modal-header">
				          		<button type="button" class="close" data-dismiss="modal">&times;</button>
				          		<h4 class="modal-title">SisConPat: Solicitação de novo acesso</h4>
				        	</div>
				        	<div class="modal-body">
			          			<div class="col-xs-offset-5 col-xs-2">
									<img src="{{ url('img/ceasa_logo.png') }}" class="img-responsive" width="100">
								</div>
								
			          			<br>
			          			<br>
			          			<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
										<div class="input-group input-group-sm">
									  		<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									  		<input type="email" class="form-control" name="email" value="" placeholder="informe seu e-mail aqui">
										</div>
									</div>
								</div>
							</div>
				        	<div class="modal-footer">
				          		<div class="form-group">
									<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
										<button type="submit" class="btn btn-block btn-primary btn-submit">Enviar <i class="fa fa-sign-in"></i></button>
									</div>
								</div>
				        	</div>
				        </form>
			      	</div>
			    </div>
			</div>
		</div>
	    <!-- /.container -->
	</section>

	<!-- @include('common.footer') -->

	<!-- Scripts -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/moment.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>

	<script src="{{ asset('js/#BootSideMenu.js') }}"></script>

	<script src="{{ asset('js/bootstrap-table.js') }}"></script>
	<script src="{{ asset('js/bootstrap-table-toolbar.js') }}"></script>
	<script src="{{ asset('js/bootstrap-table-filter.js') }}"></script>
	<script src="{{ asset('js/bootstrap-table-filter-control.js') }}"></script>

	<script src="{{ asset('js/bootstrap-table-multiple-search.js') }}"></script>
	
	<script src="{{ asset('js/bootstrap-table-export.js') }}"></script>
	<script src="{{ asset('js/bootstrap-table-pt-BR.js') }}"></script>
	<script src="{{ asset('js/tableExport.js') }}"></script>

	<script src="{{ asset('js/bootstrap-switch.min.js') }}"></script>
	<script src="{{ asset('js/Xbootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('js/Xbootstrap-datepicker.pt-BR.min.js') }}"></script>
	<script src="{{ asset('js/select2.min.js') }}"></script>
	<script src="{{ asset('js/daterangepicker.js') }}"></script>
	<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
	
	<script src="{{ asset('js/bootstrap-dialog.js') }}"></script>
	<script src="{{ asset('js/ekko-lightbox.js') }}"></script>
	<script src="{{ asset('js/price_format.js') }}"></script>
	<script src="{{ asset('js/masked_input.js') }}"></script>

	<script>
		function onDestroy(url)
			{
				BootstrapDialog.confirm(
     				{
            			title: 'Confirmar exclusão',
            			message: 'Deseja realmente EXCLUIR este registro ?\n\n\n\nNão se preocupe pois caso existam restrições, esta operação será cancelada informando os motivos.',
            			type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            			closable: false, // <-- Default value is false
            			draggable: true, // <-- Default value is false
            			btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
            			btnOKLabel: 'EXCLUIR !', // <-- Default value is 'OK',
            			btnOKClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
            			callback: function(result) 
            			{
                			// result will be true if button was click, while it will be false if users close the dialog directly.
                			if(result) 
                			{
                   				$(location).attr('href',url);
                			}
            			}
        			});
       
   			}
	</script>

	<script type="text/javascript">
    	$(document).ready(function ($) {
    		$.datepicker.setDefaults
			({
				dateFormat: 'dd/mm/yy',
			    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
			    dayNamesMin: ['D','S','T','Q','Q','S','S'],
			    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'],
			    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
			    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
				nextText: 'Próximo',
				prevText: 'Anterior',
				changeMonth: 'true',
				changeYear: 'true'
			});
		});
    </script>
    
	@yield('js_scripts')

</body>
</html>
