<?php

use Illuminate\Database\Seeder;
use Samark\ModuleGenerate\ConfigModuleRules;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'type'          => 'normal',
                'name'          => 'required',
                'alert_message' => 'กรุณากรอกข้อมูล',
                'status'        => 'active',
                'created_at'    => now(),
                'updated_at'    => now(),
            ], [
                'type'          => 'normal',
                'name'          => 'min',
                'alert_message' => 'กรุณากรอกข้อมูลอย่างน้อย',
                'status'        => 'active',
                'created_at'    => now(),
                'updated_at'    => now(),
            ], [
                'type'          => 'normal',
                'name'          => 'email',
                'alert_message' => 'รุปแบบอีเมล์ไม่ถูกต้อง',
                'status'        => 'active',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],[
                'type'          => 'normal',
                'name'          => 'number',
                'alert_message' => 'กรูณากรอกเฉพาะตัวเลข',
                'status'        => 'active',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ];

        ConfigModuleRules::insert($data);
    }
}
