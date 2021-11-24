<?php

namespace App\Providers;

use App\Repositories\ApiRepositoryInterface;
use App\Repositories\FinnhubApiRepository;
use Finnhub\Configuration;
use Finnhub\Api\DefaultApi;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ApiRepositoryInterface::class, function () {

            $config = Configuration::getDefaultConfiguration()
                ->setApiKey('token', env('FINNHUB_API_KEY'));
            $client = new DefaultApi(
                new Client(),
                $config
            );
            return new FinnhubApiRepository($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
