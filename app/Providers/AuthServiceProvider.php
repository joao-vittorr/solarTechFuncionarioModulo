<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User; // Certifique-se de importar o modelo User

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */

     
     public function boot()
     {
         $this->registerPolicies();
     
         Gate::define('admin', function ($user) {
             $accessLevel = User::where('id', $user->id)->value('access_level');
             return $accessLevel === 'admin';
         });
         
         Gate::define('funcionario', function ($user) {
            $accessLevel = User::where('id', $user->id)->value('access_level');
            return $accessLevel === 'funcionario';
        });
        Gate::define('admin-funcionario', function ($user) {
            $accessLevel = User::where('id', $user->id)->value('access_level');
            return in_array($accessLevel, ['admin', 'funcionario']);
        });
     }
     
    
}
