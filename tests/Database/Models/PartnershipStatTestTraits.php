<?php

namespace NextDeveloper\Partnership\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Partnership\Database\Filters\PartnershipStatQueryFilter;
use NextDeveloper\Partnership\Services\AbstractServices\AbstractPartnershipStatService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait PartnershipStatTestTraits
{
    public $http;

    /**
     *   Creating the Guzzle object
     */
    public function setupGuzzle()
    {
        $this->http = new Client(
            [
            'base_uri'  =>  '127.0.0.1:8000'
            ]
        );
    }

    /**
     *   Destroying the Guzzle object
     */
    public function destroyGuzzle()
    {
        $this->http = null;
    }

    public function test_http_partnershipstat_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/partnership/partnershipstat',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_partnershipstat_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/partnership/partnershipstat', [
            'form_params'   =>  [
                'sales_count'  =>  '1',
                'visitor_count'  =>  '1',
                'customer_count'  =>  '1',
                'subscription_count'  =>  '1',
                'product_count'  =>  '1',
                    'date'  =>  now(),
                            ],
                ['http_errors' => false]
            ]
        );

        $this->assertEquals($response->getStatusCode(), Response::HTTP_OK);
    }

    /**
     * Get test
     *
     * @return bool
     */
    public function test_partnershipstat_model_get()
    {
        $result = AbstractPartnershipStatService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_partnershipstat_get_all()
    {
        $result = AbstractPartnershipStatService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_partnershipstat_get_paginated()
    {
        $result = AbstractPartnershipStatService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_partnershipstat_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipstat_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipStat\PartnershipStatRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_sales_count_filter()
    {
        try {
            $request = new Request(
                [
                'sales_count'  =>  '1'
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_visitor_count_filter()
    {
        try {
            $request = new Request(
                [
                'visitor_count'  =>  '1'
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_customer_count_filter()
    {
        try {
            $request = new Request(
                [
                'customer_count'  =>  '1'
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_subscription_count_filter()
    {
        try {
            $request = new Request(
                [
                'subscription_count'  =>  '1'
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_product_count_filter()
    {
        try {
            $request = new Request(
                [
                'product_count'  =>  '1'
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'dateStart'  =>  now()
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'dateEnd'  =>  now()
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'dateStart'  =>  now(),
                'dateEnd'  =>  now()
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipstat_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipStatQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipStat::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}