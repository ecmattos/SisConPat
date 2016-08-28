<div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">
          @if($patrimonial->patrimonial_status_id!=5)
            <a href="{!! route('patrimonials.edit', ['id' => $patrimonial->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
          @endif 
          <b>{{ $patrimonial->code }} - {{ $patrimonial->description }}</b>
        </h3>
        <span class="pull-right panel-clickable"><i class="fa fa-chevron-up"></i></span>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              
            </thead>
            <tbody>
              <tr>
                <td class="text-right" width="25%">Código antigo</td>
                <td class="text-left">{{ $patrimonial->code_old }}</td>
              </tr>

              <tr>
                <td class="text-right">Tipo</td>
                <td class="text-left">{{ $patrimonial->patrimonial_type->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Sub-tipo</td>
                <td class="text-left">{{ $patrimonial->patrimonial_sub_type->description }}</td>
              </tr>
              
              <tr>
                <td class="text-right">Marca</td>
                <td class="text-left">{{ $patrimonial->patrimonial_brand->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Modelo</td>
                <td class="text-left">{{ $patrimonial->patrimonial_model->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Série</td>
                <td class="text-left">{{ $patrimonial->serial }}</td>
              </tr>

              <tr>
                <td class="text-right">Filial</td>
                <td class="text-left">{{ $patrimonial->management_unit->region->code }} - {{ $patrimonial->management_unit->region->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Unid.Gestora</td>
                <td class="text-left">{{ $patrimonial->management_unit->code }} - {{ $patrimonial->management_unit->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Setor</td>
                <td class="text-left">{{ $patrimonial->patrimonial_sector->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Sub-setor</td>
                <td class="text-left">{{ $patrimonial->patrimonial_sub_sector->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Situação</td>
                <td class="text-left">{{ $patrimonial->patrimonial_status->description }} desde {{ $patrimonial->patrimonial_status_date->format('d/m/Y') }} ({{ $patrimonial->patrimonial_status_date->diffForHumans() }})</td>
              </tr>

              <tr>
                <td class="text-right">Observações</td>
                <td class="text-left">{{ $patrimonial->comments }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>