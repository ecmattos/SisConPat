<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(RoleTableSeeder::class);
        $this->call(UserStatusTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        ###$this->call(GenderTableSeeder::class);
        ###$this->call(MemberStatusTableSeeder::class);
        ###$this->call(BankTableSeeder::class);
        ###$this->call(PlanTableSeeder::class);
        ###$this->call(MemberStatusReasonTableSeeder::class);
        ###$this->call(PartnerTypeTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(RegionTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(ProviderTableSeeder::class);
        ###$this->call(PaymentMethodTableSeeder::class);
        ###$this->call(PaymentStatusTableSeeder::class);
        ###$this->call(PaymentReasonTableSeeder::class);
        $this->call(PatrimonialInterventionTypeTableSeeder::class);
        $this->call(PatrimonialBrandTableSeeder::class);
        $this->call(PatrimonialModelTableSeeder::class);
        $this->call(PatrimonialSectorTableSeeder::class);
        $this->call(PatrimonialSubSectorTableSeeder::class);
        $this->call(PatrimonialStatusTableSeeder::class);
        $this->call(PatrimonialMovementTypeTableSeeder::class);
        $this->call(AccountTypeTableSeeder::class);
        $this->call(AccountBalanceTypeTableSeeder::class);
        $this->call(AccountCoverageTypeTableSeeder::class);
        $this->call(AccountingAccountTableSeeder::class);
        $this->call(PatrimonialTypeTableSeeder::class);
        $this->call(PatrimonialSubTypeTableSeeder::class);
        $this->call(MaterialUnitTableSeeder::class);
        $this->call(ManagementUnitTableSeeder::class);

        Model::reguard();
    }
}
