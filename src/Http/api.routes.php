<?php

Route::prefix('partnership')->group(
    function () {
        Route::prefix('marketing')->group(
            function () {
                Route::get('/', 'Marketing\MarketingController@index');
                Route::get('/actions', 'Marketing\MarketingController@getActions');

                Route::get('{partnership_marketing}/tags ', 'Marketing\MarketingController@tags');
                Route::post('{partnership_marketing}/tags ', 'Marketing\MarketingController@saveTags');
                Route::get('{partnership_marketing}/addresses ', 'Marketing\MarketingController@addresses');
                Route::post('{partnership_marketing}/addresses ', 'Marketing\MarketingController@saveAddresses');

                Route::get('/{partnership_marketing}/{subObjects}', 'Marketing\MarketingController@relatedObjects');
                Route::get('/{partnership_marketing}', 'Marketing\MarketingController@show');

                Route::post('/', 'Marketing\MarketingController@store');
                Route::post('/{partnership_marketing}/do/{action}', 'Marketing\MarketingController@doAction');

                Route::patch('/{partnership_marketing}', 'Marketing\MarketingController@update');
                Route::delete('/{partnership_marketing}', 'Marketing\MarketingController@destroy');
            }
        );

        Route::prefix('distribution')->group(
            function () {
                Route::get('/', 'Distribution\DistributionController@index');
                Route::get('/actions', 'Distribution\DistributionController@getActions');

                Route::get('{partnership_distribution}/tags ', 'Distribution\DistributionController@tags');
                Route::post('{partnership_distribution}/tags ', 'Distribution\DistributionController@saveTags');
                Route::get('{partnership_distribution}/addresses ', 'Distribution\DistributionController@addresses');
                Route::post('{partnership_distribution}/addresses ', 'Distribution\DistributionController@saveAddresses');

                Route::get('/{partnership_distribution}/{subObjects}', 'Distribution\DistributionController@relatedObjects');
                Route::get('/{partnership_distribution}', 'Distribution\DistributionController@show');

                Route::post('/', 'Distribution\DistributionController@store');
                Route::post('/{partnership_distribution}/do/{action}', 'Distribution\DistributionController@doAction');

                Route::patch('/{partnership_distribution}', 'Distribution\DistributionController@update');
                Route::delete('/{partnership_distribution}', 'Distribution\DistributionController@destroy');
            }
        );

        Route::prefix('production')->group(
            function () {
                Route::get('/', 'Production\ProductionController@index');
                Route::get('/actions', 'Production\ProductionController@getActions');

                Route::get('{partnership_production}/tags ', 'Production\ProductionController@tags');
                Route::post('{partnership_production}/tags ', 'Production\ProductionController@saveTags');
                Route::get('{partnership_production}/addresses ', 'Production\ProductionController@addresses');
                Route::post('{partnership_production}/addresses ', 'Production\ProductionController@saveAddresses');

                Route::get('/{partnership_production}/{subObjects}', 'Production\ProductionController@relatedObjects');
                Route::get('/{partnership_production}', 'Production\ProductionController@show');

                Route::post('/', 'Production\ProductionController@store');
                Route::post('/{partnership_production}/do/{action}', 'Production\ProductionController@doAction');

                Route::patch('/{partnership_production}', 'Production\ProductionController@update');
                Route::delete('/{partnership_production}', 'Production\ProductionController@destroy');
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

        Route::prefix('customers')->group(
            function () {
                Route::get('/', 'Customers\CustomersController@index');
                Route::get('/actions', 'Customers\CustomersController@getActions');

                Route::get('{partnership_customers}/tags ', 'Customers\CustomersController@tags');
                Route::post('{partnership_customers}/tags ', 'Customers\CustomersController@saveTags');
                Route::get('{partnership_customers}/addresses ', 'Customers\CustomersController@addresses');
                Route::post('{partnership_customers}/addresses ', 'Customers\CustomersController@saveAddresses');

                Route::get('/{partnership_customers}/{subObjects}', 'Customers\CustomersController@relatedObjects');
                Route::get('/{partnership_customers}', 'Customers\CustomersController@show');

                Route::post('/', 'Customers\CustomersController@store');
                Route::post('/{partnership_customers}/do/{action}', 'Customers\CustomersController@doAction');

                Route::patch('/{partnership_customers}', 'Customers\CustomersController@update');
                Route::delete('/{partnership_customers}', 'Customers\CustomersController@destroy');
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

        // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE























    }
);





