<?php 

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions =
        [
           [
                'permission_title'          => 'Administração - Banco: Inclusão',
                'permission_slug'           => 'banks.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Banco: Alteração',
                'permission_slug'           => 'banks.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Banco: Exclusão',
                'permission_slug'           => 'banks.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Banco: Consulta',
                'permission_slug'           => 'banks.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Desligamento - Motivo: Inclusão',
                'permission_slug'           => 'members_status_reasons.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Desligamento - Motivo: Alteração',
                'permission_slug'           => 'members_status_reasons.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Desligamento - Motivo: Exclusão',
                'permission_slug'           => 'members_status_reasons.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Desligamento - Motivo: Consulta',
                'permission_slug'           => 'members_status_reasons.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Sexo: Inclusão',
                'permission_slug'           => 'genders.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Sexo: Alteração',
                'permission_slug'           => 'genders.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Sexo: Exclusão',
                'permission_slug'           => 'genders.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Sexo: Consulta',
                'permission_slug'           => 'genders.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Região: Inclusão',
                'permission_slug'           => 'regions.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Região: Alteração',
                'permission_slug'           => 'regions.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Região: Exclusão',
                'permission_slug'           => 'regions.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Região: Consulta',
                'permission_slug'           => 'regions.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Estado: Inclusão',
                'permission_slug'           => 'states.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Estado: Alteração',
                'permission_slug'           => 'states.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Estado: Exclusão',
                'permission_slug'           => 'states.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Estado: Consulta',
                'permission_slug'           => 'states.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Cidade: Inclusão',
                'permission_slug'           => 'cities.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Cidade: Alteração',
                'permission_slug'           => 'cities.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Cidade: Exclusão',
                'permission_slug'           => 'cities.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Cidade: Consulta',
                'permission_slug'           => 'cities.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Usuários: Inclusão',
                'permission_slug'           => 'users.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Usuários: Alteração',
                'permission_slug'           => 'users.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Usuários: Exclusão',
                'permission_slug'           => 'users.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Usuários: Consulta',
                'permission_slug'           => 'users.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração: Usuários',
                'permission_slug'           => 'users.index',
                'permission_description'    => ''
            ],
                        [
                'permission_title'          => 'Administração - Tipos de Patrimônios: Inclusão',
                'permission_slug'           => 'patrimonial_types.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Tipos de Patrimônios: Alteração',
                'permission_slug'           => 'patrimonial_types.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Tipos de Patrimônios: Exclusão',
                'permission_slug'           => 'patrimonial_types.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Tipos de Patrimônios: Consulta',
                'permission_slug'           => 'patrimonial_types.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Sub-tipos de Patrimônios: Inclusão',
                'permission_slug'           => 'patrimonial_sub_types.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Sub-tipos de Patrimônios: Alteração',
                'permission_slug'           => 'patrimonial_sub_types.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Sub-tipos de Patrimônios: Exclusão',
                'permission_slug'           => 'patrimonial_sub_types.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Sub-tipos de Patrimônios: Consulta',
                'permission_slug'           => 'patrimonial_sub_types.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Marcas de Patrimônios: Inclusão',
                'permission_slug'           => 'patrimonial_brands.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Marcas de Patrimônios: Alteração',
                'permission_slug'           => 'patrimonial_brands.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Marcas de Patrimônios: Exclusão',
                'permission_slug'           => 'patrimonial_brands.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Marcas de Patrimônios: Consulta',
                'permission_slug'           => 'patrimonial_brands.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Modelos de Patrimônios: Inclusão',
                'permission_slug'           => 'patrimonial_models.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Modelos de Patrimônios: Alteração',
                'permission_slug'           => 'patrimonial_models.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Modelos de Patrimônios: Exclusão',
                'permission_slug'           => 'patrimonial_models.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Setores de Patrimônios: Consulta',
                'permission_slug'           => 'patrimonial_models.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Setores de Patrimônios: Inclusão',
                'permission_slug'           => 'patrimonial_sectors.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Setores de Patrimônios: Alteração',
                'permission_slug'           => 'patrimonial_sectors.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Setores de Patrimônios: Exclusão',
                'permission_slug'           => 'patrimonial_sectors.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Setores de Patrimônios: Consulta',
                'permission_slug'           => 'patrimonial_sectors.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Sub-setores de Patrimônios: Inclusão',
                'permission_slug'           => 'patrimonial_sub_sectors.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Sub-setores de Patrimônios: Alteração',
                'permission_slug'           => 'patrimonial_sub_sectors.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Sub-setores de Patrimônios: Exclusão',
                'permission_slug'           => 'patrimonial_sub_sectors.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Sub-setores de Patrimônios: Consulta',
                'permission_slug'           => 'patrimonial_sub_sectors.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Unidades Gestoras: Inclusão',
                'permission_slug'           => 'management_units.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Unidades Gestoras: Alteração',
                'permission_slug'           => 'management_units.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Unidades Gestoras: Exclusão',
                'permission_slug'           => 'management_units.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Unidades Gestoras: Consulta',
                'permission_slug'           => 'management_units.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Fornecedores: Inclusão',
                'permission_slug'           => 'providers.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Fornecedores: Alteração',
                'permission_slug'           => 'providers.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Fornecedores: Exclusão',
                'permission_slug'           => 'providers.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Fornecedores: Consulta',
                'permission_slug'           => 'providers.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Patrimônios: Inclusão',
                'permission_slug'           => 'patrimonials.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Patrimônios: Alteração',
                'permission_slug'           => 'patrimonials.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Patrimônios: Exclusão',
                'permission_slug'           => 'patrimonials.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Patrimônios: Consulta',
                'permission_slug'           => 'patrimonials.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Patrimônios: Cópia',
                'permission_slug'           => 'patrimonials.copy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Tipos Movimentações Patrimônios: Inclusão',
                'permission_slug'           => 'patrimonial_movement_types.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Tipos Movimentações Patrimônios: Alteração',
                'permission_slug'           => 'patrimonial_movement_types.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Tipos Movimentações Patrimônios: Exclusão',
                'permission_slug'           => 'patrimonial_movement_types.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Tipos Movimentações Patrimônios: Consulta',
                'permission_slug'           => 'patrimonial_movement_types.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Patrimônios: Pesquisa',
                'permission_slug'           => 'patrimonials.search',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Plano de Contas: Inclusão',
                'permission_slug'           => 'accounting_accounts.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Plano de Contas: Alteração',
                'permission_slug'           => 'accounting_accounts.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Plano de Contas: Exclusão',
                'permission_slug'           => 'accounting_accounts.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Plano de Contas: Consulta',
                'permission_slug'           => 'accounting_accounts.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Patrimônios - Movimentações: Inclusão',
                'permission_slug'           => 'patrimonial_movements.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Unidades de Materiais: Inclusão',
                'permission_slug'           => 'material_units.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Unidades de Materiais: Alteração',
                'permission_slug'           => 'material_units.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Unidades de Materiais: Exclusão',
                'permission_slug'           => 'material_units.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Unidades de Materiais: Consulta',
                'permission_slug'           => 'material_units.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Materiais: Inclusão',
                'permission_slug'           => 'materials.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Materiais: Alteração',
                'permission_slug'           => 'materials.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Materiais: Exclusão',
                'permission_slug'           => 'materials.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Materiais: Consulta',
                'permission_slug'           => 'materials.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Patrimônios - Materiais: Inclusão',
                'permission_slug'           => 'patrimonial_materials.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Patrimônios - Materiais: Alteração',
                'permission_slug'           => 'patrimonial_materials.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Serviços: Inclusão',
                'permission_slug'           => 'services.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Serviços: Alteração',
                'permission_slug'           => 'services.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Serviços: Exclusão',
                'permission_slug'           => 'services.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Serviços: Consulta',
                'permission_slug'           => 'services.show',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Patrimônios - Serviços: Inclusão',
                'permission_slug'           => 'patrimonial_services.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Patrimônios - Serviços: Alteração',
                'permission_slug'           => 'patrimonial_services.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Saldo Inicial Contas Contábeis: Inclusão',
                'permission_slug'           => 'balance_sheet_previouses.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Saldo Inicial Contas Contábeis: Alteração',
                'permission_slug'           => 'balance_sheet_previouses.edit',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Saldo Inicial Contas Contábeis: Inclusão',
                'permission_slug'           => 'balance_sheet_previouses.create',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Saldo Inicial Contas Contábeis: Pesquisa',
                'permission_slug'           => 'balance_sheet_previouses.search',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Saldo Inicial Contas Contábeis: Exclusão',
                'permission_slug'           => 'balance_sheet_previouses.destroy',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Administração - Balancetes: Pesquisa',
                'permission_slug'           => 'balance_sheets.search',
                'permission_description'    => ''
            ],
            [
                'permission_title'          => 'Relatórios: Patrimônios - Aquisições',
                'permission_slug'           => 'patrimonials_reports_purchases.search',
                'permission_description'    => ''
            ]
        ];
    
        foreach ($permissions as $permission)
        {
            \SisConPat\Permission::create($permission);
        }
    }
}
