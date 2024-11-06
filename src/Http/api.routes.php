<?php

Route::prefix('partnership')->group(
    function () {
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

        Route::prefix('accounts-perspective')->group(
            function () {
                Route::get('/', 'AccountsPerspective\AccountsPerspectiveController@index');
                Route::get('/actions', 'AccountsPerspective\AccountsPerspectiveController@getActions');

                Route::get('{partnership_accounts_perspective}/tags ', 'AccountsPerspective\AccountsPerspectiveController@tags');
                Route::post('{partnership_accounts_perspective}/tags ', 'AccountsPerspective\AccountsPerspectiveController@saveTags');
                Route::get('{partnership_accounts_perspective}/addresses ', 'AccountsPerspective\AccountsPerspectiveController@addresses');
                Route::post('{partnership_accounts_perspective}/addresses ', 'AccountsPerspective\AccountsPerspectiveController@saveAddresses');

                Route::get('/{partnership_accounts_perspective}/{subObjects}', 'AccountsPerspective\AccountsPerspectiveController@relatedObjects');
                Route::get('/{partnership_accounts_perspective}', 'AccountsPerspective\AccountsPerspectiveController@show');

                Route::post('/', 'AccountsPerspective\AccountsPerspectiveController@store');
                Route::post('/{partnership_accounts_perspective}/do/{action}', 'AccountsPerspective\AccountsPerspectiveController@doAction');

                Route::patch('/{partnership_accounts_perspective}', 'AccountsPerspective\AccountsPerspectiveController@update');
                Route::delete('/{partnership_accounts_perspective}', 'AccountsPerspective\AccountsPerspectiveController@destroy');
            }
        );

        Route::prefix('distributors-perspective')->group(
            function () {
                Route::get('/', 'DistributorsPerspective\DistributorsPerspectiveController@index');
                Route::get('/actions', 'DistributorsPerspective\DistributorsPerspectiveController@getActions');

                Route::get('{pdp}/tags ', 'DistributorsPerspective\DistributorsPerspectiveController@tags');
                Route::post('{pdp}/tags ', 'DistributorsPerspective\DistributorsPerspectiveController@saveTags');
                Route::get('{pdp}/addresses ', 'DistributorsPerspective\DistributorsPerspectiveController@addresses');
                Route::post('{pdp}/addresses ', 'DistributorsPerspective\DistributorsPerspectiveController@saveAddresses');

                Route::get('/{pdp}/{subObjects}', 'DistributorsPerspective\DistributorsPerspectiveController@relatedObjects');
                Route::get('/{pdp}', 'DistributorsPerspective\DistributorsPerspectiveController@show');

                Route::post('/', 'DistributorsPerspective\DistributorsPerspectiveController@store');
                Route::post('/{pdp}/do/{action}', 'DistributorsPerspective\DistributorsPerspectiveController@doAction');

                Route::patch('/{pdp}', 'DistributorsPerspective\DistributorsPerspectiveController@update');
                Route::delete('/{pdp}', 'DistributorsPerspective\DistributorsPerspectiveController@destroy');
            }
        );

        // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE


































    }
);







