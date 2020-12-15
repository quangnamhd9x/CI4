<?php
namespace App\Database\Seeds;
class SimpleSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'workflow_stage_id' => 1,
            'name'    => 'DBSK 25520',
            'alias' => 'L2',
            'description' => 'Wating..',
            'type' => 'Wait to pay...',
            'sort_order_id' => 1,
            'date_entered' => 2020-12-12,
            'created_by' => 2,
            'qualified_lead' => 2,
        ];

        // Using Query Builder
        $this->db->table('order_status')->insert($data);
    }
}