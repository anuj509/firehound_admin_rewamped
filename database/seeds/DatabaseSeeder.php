<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CustomersTableSeeder::class);
        $this->call(CustomerCompanyDetailsTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(GuidesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(TypeGuideTableSeeder::class);
        $this->call(CustomerPackagesTableSeeder::class);
        $this->call(PackagesTableSeeder::class);
        $this->call(PackageTypesTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
        $this->call(TicketsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(CategoriesDealsTableSeeder::class);
        $this->call(FulfillmentsTableSeeder::class);
        $this->call(MarketplacesTableSeeder::class);
        $this->call(MonthlySalesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
    }
}
