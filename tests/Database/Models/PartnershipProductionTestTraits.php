<?php

namespace NextDeveloper\Partnership\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Partnership\Database\Filters\PartnershipProductionQueryFilter;
use NextDeveloper\Partnership\Services\AbstractServices\AbstractPartnershipProductionService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait PartnershipProductionTestTraits
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

    public function test_http_partnershipproduction_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/partnership/partnershipproduction',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_partnershipproduction_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/partnership/partnershipproduction', [
            'form_params'   =>  [
                'description'  =>  'a',
                'terms'  =>  'a',
                'leo_engineer_count'  =>  '1',
                'devops_engineer_count'  =>  '1',
                'software_engineer_count'  =>  '1',
                'sales_engineer_count'  =>  '1',
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
    public function test_partnershipproduction_model_get()
    {
        $result = AbstractPartnershipProductionService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_partnershipproduction_get_all()
    {
        $result = AbstractPartnershipProductionService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_partnershipproduction_get_paginated()
    {
        $result = AbstractPartnershipProductionService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_partnershipproduction_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipproduction_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipproduction_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipProduction\PartnershipProductionRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipproduction_event_description_filter()
    {
        try {
            $request = new Request(
                [
                'description'  =>  'a'
                ]
            );

            $filter = new PartnershipProductionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipproduction_event_terms_filter()
    {
        try {
            $request = new Request(
                [
                'terms'  =>  'a'
                ]
            );

            $filter = new PartnershipProductionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipproduction_event_leo_engineer_count_filter()
    {
        try {
            $request = new Request(
                [
                'leo_engineer_count'  =>  '1'
                ]
            );

            $filter = new PartnershipProductionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipproduction_event_devops_engineer_count_filter()
    {
        try {
            $request = new Request(
                [
                'devops_engineer_count'  =>  '1'
                ]
            );

            $filter = new PartnershipProductionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipproduction_event_software_engineer_count_filter()
    {
        try {
            $request = new Request(
                [
                'software_engineer_count'  =>  '1'
                ]
            );

            $filter = new PartnershipProductionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipproduction_event_sales_engineer_count_filter()
    {
        try {
            $request = new Request(
                [
                'sales_engineer_count'  =>  '1'
                ]
            );

            $filter = new PartnershipProductionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipproduction_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipProductionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipproduction_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipProductionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipproduction_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipProductionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipproduction_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipProductionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipproduction_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipProductionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipproduction_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipProductionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipproduction_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipProductionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipproduction_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipProductionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipproduction_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipProductionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipProduction::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}