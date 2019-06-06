<?php

    namespace App\Providers;

    use Illuminate\Support\ServiceProvider;
    use View;
    use Auth;

    class AppServiceProvider extends ServiceProvider {

        /**
         * Register any application services.
         *
         * @return void
         */
        public function register()
        {
            //
        }

        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot()
        {

            // View facade. If you put '*' instead of 'home' you target all views
            View::composer('home', function ($view) {
                $view->with('auth', Auth::user());
            });

            view()->composer('posts.index', function ($view) {
                $view->with('categories', \App\Category::pluck('name'));
            });
        }
    }
