<?php

Route::prefix('partnership')->group(
    function () {
        Route::prefix('distributions')->group(
            function () {
                Route::get('/', 'Distributions\DistributionsController@index');
                Route::get('/actions', 'Distributions\DistributionsController@getActions');

                Route::get('{partnership_distributions}/tags ', 'Distributions\DistributionsController@tags');
                Route::post('{partnership_distributions}/tags ', 'Distributions\DistributionsController@saveTags');
                Route::get('{partnership_distributions}/addresses ', 'Distributions\DistributionsController@addresses');
                Route::post('{partnership_distributions}/addresses ', 'Distributions\DistributionsController@saveAddresses');

                Route::get('/{partnership_distributions}/{subObjects}', 'Distributions\DistributionsController@relatedObjects');
                Route::get('/{partnership_distributions}', 'Distributions\DistributionsController@show');

                Route::post('/', 'Distributions\DistributionsController@store');
                Route::post('/{partnership_distributions}/do/{action}', 'Distributions\DistributionsController@doAction');

                Route::patch('/{partnership_distributions}', 'Distributions\DistributionsController@update');
                Route::delete('/{partnership_distributions}', 'Distributions\DistributionsController@destroy');
            }
        );

        Route::prefix('marketings')->group(
            function () {
                Route::get('/', 'Marketings\MarketingsController@index');
                Route::get('/actions', 'Marketings\MarketingsController@getActions');

                Route::get('{partnership_marketings}/tags ', 'Marketings\MarketingsController@tags');
                Route::post('{partnership_marketings}/tags ', 'Marketings\MarketingsController@saveTags');
                Route::get('{partnership_marketings}/addresses ', 'Marketings\MarketingsController@addresses');
                Route::post('{partnership_marketings}/addresses ', 'Marketings\MarketingsController@saveAddresses');

                Route::get('/{partnership_marketings}/{subObjects}', 'Marketings\MarketingsController@relatedObjects');
                Route::get('/{partnership_marketings}', 'Marketings\MarketingsController@show');

                Route::post('/', 'Marketings\MarketingsController@store');
                Route::post('/{partnership_marketings}/do/{action}', 'Marketings\MarketingsController@doAction');

                Route::patch('/{partnership_marketings}', 'Marketings\MarketingsController@update');
                Route::delete('/{partnership_marketings}', 'Marketings\MarketingsController@destroy');
            }
        );

        Route::prefix('productions')->group(
            function () {
                Route::get('/', 'Productions\ProductionsController@index');
                Route::get('/actions', 'Productions\ProductionsController@getActions');

                Route::get('{partnership_productions}/tags ', 'Productions\ProductionsController@tags');
                Route::post('{partnership_productions}/tags ', 'Productions\ProductionsController@saveTags');
                Route::get('{partnership_productions}/addresses ', 'Productions\ProductionsController@addresses');
                Route::post('{partnership_productions}/addresses ', 'Productions\ProductionsController@saveAddresses');

                Route::get('/{partnership_productions}/{subObjects}', 'Productions\ProductionsController@relatedObjects');
                Route::get('/{partnership_productions}', 'Productions\ProductionsController@show');

                Route::post('/', 'Productions\ProductionsController@store');
                Route::post('/{partnership_productions}/do/{action}', 'Productions\ProductionsController@doAction');

                Route::patch('/{partnership_productions}', 'Productions\ProductionsController@update');
                Route::delete('/{partnership_productions}', 'Productions\ProductionsController@destroy');
            }
        );

        Route::prefix('stats')->group(
            function () {
                Route::get('/', 'Stats\StatsController@index');
                Route::get('/actions', 'Stats\StatsController@getActions');

                Route::get('{partnership_stats}/tags ', 'Stats\StatsController@tags');
                Route::post('{partnership_stats}/tags ', 'Stats\StatsController@saveTags');
                Route::get('{partnership_stats}/addresses ', 'Stats\StatsController@addresses');
                Route::post('{partnership_stats}/addresses ', 'Stats\StatsController@saveAddresses');

                Route::get('/{partnership_stats}/{subObjects}', 'Stats\StatsController@relatedObjects');
                Route::get('/{partnership_stats}', 'Stats\StatsController@show');

                Route::post('/', 'Stats\StatsController@store');
                Route::post('/{partnership_stats}/do/{action}', 'Stats\StatsController@doAction');

                Route::patch('/{partnership_stats}', 'Stats\StatsController@update');
                Route::delete('/{partnership_stats}', 'Stats\StatsController@destroy');
            }
        );

        Route::prefix('accounts')->group(
            function () {
                Route::get('/', 'Accounts\AccountsController@index');
                Route::get('/actions', 'Accounts\AccountsController@getActions');

                Route::get('{partnership_accounts}/tags ', 'Accounts\AccountsController@tags');
                Route::post('{partnership_accounts}/tags ', 'Accounts\AccountsController@saveTags');
                Route::get('{partnership_accounts}/addresses ', 'Accounts\AccountsController@addresses');
                Route::post('{partnership_accounts}/addresses ', 'Accounts\AccountsController@saveAddresses');

                Route::get('/{partnership_accounts}/{subObjects}', 'Accounts\AccountsController@relatedObjects');
                Route::get('/{partnership_accounts}', 'Accounts\AccountsController@show');

                Route::post('/', 'Accounts\AccountsController@store');
                Route::post('/{partnership_accounts}/do/{action}', 'Accounts\AccountsController@doAction');

                Route::patch('/{partnership_accounts}', 'Accounts\AccountsController@update');
                Route::delete('/{partnership_accounts}', 'Accounts\AccountsController@destroy');
            }
        );

        Route::prefix('affiliates')->group(
            function () {
                Route::get('/', 'Affiliates\AffiliatesController@index');
                Route::get('/actions', 'Affiliates\AffiliatesController@getActions');

                Route::get('{partnership_affiliates}/tags ', 'Affiliates\AffiliatesController@tags');
                Route::post('{partnership_affiliates}/tags ', 'Affiliates\AffiliatesController@saveTags');
                Route::get('{partnership_affiliates}/addresses ', 'Affiliates\AffiliatesController@addresses');
                Route::post('{partnership_affiliates}/addresses ', 'Affiliates\AffiliatesController@saveAddresses');

                Route::get('/{partnership_affiliates}/{subObjects}', 'Affiliates\AffiliatesController@relatedObjects');
                Route::get('/{partnership_affiliates}', 'Affiliates\AffiliatesController@show');

                Route::post('/', 'Affiliates\AffiliatesController@store');
                Route::post('/{partnership_affiliates}/do/{action}', 'Affiliates\AffiliatesController@doAction');

                Route::patch('/{partnership_affiliates}', 'Affiliates\AffiliatesController@update');
                Route::delete('/{partnership_affiliates}', 'Affiliates\AffiliatesController@destroy');
            }
        );

        // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE












    }
);


