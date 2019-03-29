<?php

namespace Samark\ModuleGenerate\Http\Controllers;

use Samark\ModuleGenerate\Sidebar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class SidebarController
 * @package Samark\ModuleGenerate\Http\Controllers
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
class SidebarController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $main = factory(Sidebar::class, 5)->create();
        foreach ($main as $item) {
            if ($item->type == 'parent') {
                factory(Sidebar::class, 3)->create([
                    'parent_id' => $item->id
                ]);
            }
        }
        return Sidebar::with('child')->get();
    }
}
