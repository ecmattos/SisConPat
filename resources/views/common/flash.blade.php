@if(Session::has('errors'))
  	<div class="text-center">
        <h4>Favor verificar o(s) erro(s) abaixo:</h4>
    </div>
    
    <ul class="alert alert-danger" style="list-style-type: none">
        @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach
    </ul>
@endif

@if(Session::has('flash_message_success'))
  	<div class="alert alert-success" role="alert" align="center">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		{{ Session::get('flash_message_success') }}
  	</div>
@endif

@if(Session::has('flash_message_danger'))
  	<div class="alert alert-danger" role="alert" align="center">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		{{ Session::get('flash_message_danger') }}
  	</div>
@endif

@if(Session::has('flash_message_warning'))
  	<div class="alert alert-warning" role="alert" align="center">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		{{ Session::get('flash_message_warning') }}
      <p class="pull-right">
        <a class="btn btn-default" href="#">Link</a>
    </p>
  	</div>
@endif


@if(Session::has('flash_message_partner_destroy'))
    <div class="alert alert-danger" role="alert" align="left">
      {{ Session::get('flash_message_partner_destroy') }}
      <p class="pull-right">
         Recuperar ? 
        <a href="{!! route('partners.restore', ['id' => $partner->id]) !!}" class="btn btn-success">SIM</a>
        <a href="{!! route('partners.deleted', ['id' => $partner->id]) !!}" class="btn btn-danger">Não</a>
      </p>
    </div>
@endif

