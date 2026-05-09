<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \BezhanSalleh\LanguageSwitch\LanguageSwitch::configureUsing(function (\BezhanSalleh\LanguageSwitch\LanguageSwitch $switch) {
            $switch
                ->locales(['en', 'ar'])
                ->labels([
                    'en' => 'English',
                    'ar' => 'العربية',
                ]);
        });
        
    if (app()->isLocal()) {

        DB::listen(function ($query) {
            $sql = vsprintf(
                str_replace('?', "'%s'", $query->sql),
                $query->bindings
            );

            $logMessage = "\n[SQL] {$sql} ({$query->time} ms)\n";
            if (defined('STDOUT')) {
                fwrite(\STDOUT, $logMessage);
            } else {
                file_put_contents('php://stderr', $logMessage);
            }
        });

    }
}
}
