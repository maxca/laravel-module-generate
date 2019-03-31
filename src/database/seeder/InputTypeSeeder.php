<?php

use Illuminate\Database\Seeder;
use Samark\ModuleGenerate\ConfigModuleInputType;

class InputTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'          => 'text',
                'type'          => 'input',
                'status'        => 'active',
                'allowed_input' => 'all',
                'created_at'    => now(),
                'updated_at'    => now(),
            ], [
                'name'          => 'number',
                'type'          => 'input',
                'status'        => 'active',
                'allowed_input' => 'all',
                'created_at'    => now(),
                'updated_at'    => now(),
            ], [
                'name'          => 'radio',
                'type'          => 'input',
                'status'        => 'active',
                'allowed_input' => 'all',
                'created_at'    => now(),
                'updated_at'    => now(),
            ], [
                'name'          => 'checkbox',
                'type'          => 'input',
                'status'        => 'active',
                'allowed_input' => 'all',
                'created_at'    => now(),
                'updated_at'    => now(),
            ], [
                'name'          => 'image',
                'type'          => 'file',
                'status'        => 'active',
                'allowed_input' => 'all',
                'created_at'    => now(),
                'updated_at'    => now(),
            ], [
                'name'          => 'file',
                'type'          => 'file',
                'status'        => 'active',
                'allowed_input' => 'all',
                'created_at'    => now(),
                'updated_at'    => now(),
            ], [
                'name'          => 'date',
                'type'          => 'input',
                'status'        => 'active',
                'allowed_input' => 'all',
                'created_at'    => now(),
                'updated_at'    => now(),
            ], [
                'name'          => 'date_start',
                'type'          => 'input',
                'status'        => 'active',
                'allowed_input' => 'all',
                'created_at'    => now(),
                'updated_at'    => now(),
            ], [
                'name'          => 'date_end',
                'type'          => 'input',
                'status'        => 'active',
                'allowed_input' => 'all',
                'created_at'    => now(),
                'updated_at'    => now(),
            ], [
                'name'          => 'hidden',
                'type'          => 'input',
                'status'        => 'active',
                'allowed_input' => 'all',
                'created_at'    => now(),
                'updated_at'    => now(),
            ], [
                'name'          => 'disable',
                'type'          => 'input',
                'status'        => 'active',
                'allowed_input' => 'all',
                'created_at'    => now(),
                'updated_at'    => now(),
            ], [
                'name'          => 'select',
                'type'          => 'input',
                'status'        => 'active',
                'allowed_input' => 'all',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ];
        ConfigModuleInputType::insert($data);
    }
}
