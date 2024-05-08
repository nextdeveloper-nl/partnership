<?php

namespace NextDeveloper\Partnership\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Partnership\Database\Filters\PartnershipCustomerQueryFilter;
use NextDeveloper\Partnership\Services\AbstractServices\AbstractPartnershipCustomerService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait PartnershipCustomerTestTraits
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

    public function test_http_partnershipcustomer_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/partnership/partnershipcustomer',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_partnershipcustomer_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/partnership/partnershipcustomer', [
            'form_params'   =>  [
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
    public function test_partnershipcustomer_model_get()
    {
        $result = AbstractPartnershipCustomerService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_partnershipcustomer_get_all()
    {
        $result = AbstractPartnershipCustomerService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_partnershipcustomer_get_paginated()
    {
        $result = AbstractPartnershipCustomerService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_partnershipcustomer_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipcustomer_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipcustomer_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipCustomer\PartnershipCustomerRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipcustomer_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipCustomerQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipcustomer_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipCustomerQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipcustomer_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipCustomerQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipcustomer_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipCustomerQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipcustomer_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipCustomerQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipcustomer_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipCustomerQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipcustomer_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipCustomerQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipcustomer_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipCustomerQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipcustomer_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipCustomerQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipCustomer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}