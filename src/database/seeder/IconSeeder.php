<?php

use Illuminate\Database\Seeder;
use Samark\ModuleGenerate\ConfigModuleIcons;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'       => 'fa fa-save',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name'       => 'fa fa-trash',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name'       => 'fab fa-facebook',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name'       => 'fas fa-eye',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name'       => 'fas fa-edit',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name'       => 'fas fa-user',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name'       => 'fas fa-sync',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name'       => 'fab fa-google',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name'       => 'fab fa-twitter',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name'       => 'fa fa-fw fa-list',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name'       => 'fa fa-fw fa-bug',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name'       => 'fa fa-fw fa-bullhorn',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name'       => 'fa fa-fw fa-times-circle',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name'       => 'fa fa-fw fa-exclamation-triangle',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name'       => 'fa fa-fw fa-exclamation-circle',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name'       => 'fa fa-fw fa-info-circle',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name'       => 'fa fa-fw fa-life-ring',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        ConfigModuleIcons::insert($data);
    }
}
