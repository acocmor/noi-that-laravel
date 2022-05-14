<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\LoaiSanPham;
use App\Model\Website;
use App\Model\TTLienHe;
use App\Model\Address;
use App\Model\ChinhSach;
use App\Model\GioiThieu;

class AppServiceProvider extends ServiceProvider
{
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
        //
        view()->composer('pages.layouts.master', function($view) {
            $lsp = LoaiSanPham::all();
            $web = Website::find(1);
            $ch = Address::all();
            $cs = ChinhSach::all();

            $viewdata = [
                'lsp' => $lsp,
                'web' => $web,
                'ch' => $ch,
                'cs' => $cs,
            ];
            $view->with($viewdata);
        });
        view()->composer('pages.layouts.page', function($view) {
            $lsp = LoaiSanPham::all();
            $web = Website::find(1);
            $viewdata = [
                'lsp' => $lsp,
                'web' => $web,
            ];
            $view->with($viewdata);
        });
        view()->composer('pages.contact_page', function($view) {
            $lh = TTLienHe::find(1);
            $viewdata = [
                'lh' => $lh,
            ];
            $view->with($viewdata);
        });
        view()->composer('pages.index', function($view) {
            $gt = GioiThieu::find(1);
            $viewdata = [
                'gt' => $gt,
            ];
            $view->with($viewdata);
        });
    }
}
