<?php

Route::prefix('partnership')->group(
    function () {
        Route::prefix('marketings')->group(
            function () {
                Route::get('/', 'Marketings\MarketingsController@index');

                Route::get('{partnership_marketings}/tags ', 'Marketings\MarketingsController@tags');
                Route::post('{partnership_marketings}/tags ', 'Marketings\MarketingsController@saveTags');
                Route::get('{partnership_marketings}/addresses ', 'Marketings\MarketingsController@addresses');
                Route::post('{partnership_marketings}/addresses ', 'Marketings\MarketingsController@saveAddresses');

                Route::get('/{partnership_marketings}/{subObjects}', 'Marketings\MarketingsController@relatedObjects');
                Route::get('/{partnership_marketings}', 'Marketings\MarketingsController@show');

                Route::post('/', 'Marketings\MarketingsController@store');
                Route::patch('/{partnership_marketings}', 'Marketings\MarketingsController@update');
                Route::delete('/{partnership_marketings}', 'Marketings\MarketingsController@destroy');
            }
        );

        Route::prefix('distributions')->group(
            function () {
                Route::get('/', 'Distributions\DistributionsController@index');

                Route::get('{partnership_distributions}/tags ', 'Distributions\DistributionsController@tags');
                Route::post('{partnership_distributions}/tags ', 'Distributions\DistributionsController@saveTags');
                Route::get('{partnership_distributions}/addresses ', 'Distributions\DistributionsController@addresses');
                Route::post('{partnership_distributions}/addresses ', 'Distributions\DistributionsController@saveAddresses');

                Route::get('/{partnership_distributions}/{subObjects}', 'Distributions\DistributionsController@relatedObjects');
                Route::get('/{partnership_distributions}', 'Distributions\DistributionsController@show');

                Route::post('/', 'Distributions\DistributionsController@store');
                Route::patch('/{partnership_distributions}', 'Distributions\DistributionsController@update');
                Route::delete('/{partnership_distributions}', 'Distributions\DistributionsController@destroy');
            }
        );

        Route::prefix('productions')->group(
            function () {
                Route::get('/', 'Productions\ProductionsController@index');

                Route::get('{partnership_productions}/tags ', 'Productions\ProductionsController@tags');
                Route::post('{partnership_productions}/tags ', 'Productions\ProductionsController@saveTags');
                Route::get('{partnership_productions}/addresses ', 'Productions\ProductionsController@addresses');
                Route::post('{partnership_productions}/addresses ', 'Productions\ProductionsController@saveAddresses');

                Route::get('/{partnership_productions}/{subObjects}', 'Productions\ProductionsController@relatedObjects');
                Route::get('/{partnership_productions}', 'Productions\ProductionsController@show');

                Route::post('/', 'Productions\ProductionsController@store');
                Route::patch('/{partnership_productions}', 'Productions\ProductionsController@update');
                Route::delete('/{partnership_productions}', 'Productions\ProductionsController@destroy');
            }
        );

        // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE




    }
);


