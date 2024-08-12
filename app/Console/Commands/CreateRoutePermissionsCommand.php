<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class CreateRoutePermissionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Permission Generate And Save to DB';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $routes = Route::getRoutes()->getRoutes();

        foreach ($routes as $route) {
            if ($route->getName() != '' && $route->getAction()['middleware'][0] == 'web') {
                $slug = $route->getName();
                $slug_name=str_replace('.', '_', $slug);
                $permission = Permission::where('name', $route->getName())->first();
                if (is_null($permission)) {
                    permission::create(['name' => $route->getName(), 'slug' => $slug_name]);
                }
            }
        }
        $this->info('Permission Route Added Successfully');
    }
}
