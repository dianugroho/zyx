<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Traits\Uuids;

class RoleSeeder extends Seeder
{
    use Uuids;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['role' => 'User'],
            ['role' => 'Admin']
        ];

        foreach ($data as $row) {
            Role::create($row);
        }
    }
}
