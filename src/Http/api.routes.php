<?php

Route::prefix('partnership')->group(
    function () {
    Route::prefix('distribution')->group(
        function () {
            Route::get('/', 'Distribution\DistributionController@index');

            Route::get('{partnership_distribution}/tags ', 'Distribution\DistributionController@tags');
            Route::post('{partnership_distribution}/tags ', 'Distribution\DistributionController@saveTags');
            Route::get('{partnership_distribution}/addresses ', 'Distribution\DistributionController@addresses');
            Route::post('{partnership_distribution}/addresses ', 'Distribution\DistributionController@saveAddresses');

            Route::get('/{partnership_distribution}/{subObjects}', 'Distribution\DistributionController@relatedObjects');
            Route::get('/{partnership_distribution}', 'Distribution\DistributionController@show');

            Route::post('/', 'Distribution\DistributionController@store');
            Route::patch('/{partnership_distribution}', 'Distribution\DistributionController@update');
            Route::delete('/{partnership_distribution}', 'Distribution\DistributionController@destroy');
        }
    );
    Route::prefix('marketing')->group(
        function () {
            Route::get('/', 'Marketing\MarketingController@index');

            Route::get('{partnership_marketing}/tags ', 'Marketing\MarketingController@tags');
            Route::post('{partnership_marketing}/tags ', 'Marketing\MarketingController@saveTags');
            Route::get('{partnership_marketing}/addresses ', 'Marketing\MarketingController@addresses');
            Route::post('{partnership_marketing}/addresses ', 'Marketing\MarketingController@saveAddresses');

            Route::get('/{partnership_marketing}/{subObjects}', 'Marketing\MarketingController@relatedObjects');
            Route::get('/{partnership_marketing}', 'Marketing\MarketingController@show');

            Route::post('/', 'Marketing\MarketingController@store');
            Route::patch('/{partnership_marketing}', 'Marketing\MarketingController@update');
            Route::delete('/{partnership_marketing}', 'Marketing\MarketingController@destroy');
        }
    );
    Route::prefix('production')->group(
        function () {
            Route::get('/', 'Production\ProductionController@index');

            Route::get('{partnership_production}/tags ', 'Production\ProductionController@tags');
            Route::post('{partnership_production}/tags ', 'Production\ProductionController@saveTags');
            Route::get('{partnership_production}/addresses ', 'Production\ProductionController@addresses');
            Route::post('{partnership_production}/addresses ', 'Production\ProductionController@saveAddresses');

            Route::get('/{partnership_production}/{subObjects}', 'Production\ProductionController@relatedObjects');
            Route::get('/{partnership_production}', 'Production\ProductionController@show');

            Route::post('/', 'Production\ProductionController@store');
            Route::patch('/{partnership_production}', 'Production\ProductionController@update');
            Route::delete('/{partnership_production}', 'Production\ProductionController@destroy');
        }
    );
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
);

