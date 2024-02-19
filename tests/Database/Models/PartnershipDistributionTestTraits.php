<?php

namespace NextDeveloper\Partnership\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Partnership\Database\Filters\PartnershipDistributionQueryFilter;
use NextDeveloper\Partnership\Services\AbstractServices\AbstractPartnershipDistributionService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait PartnershipDistributionTestTraits
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

    public function test_http_partnershipdistribution_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/partnership/partnershipdistribution',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_partnershipdistribution_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/partnership/partnershipdistribution', [
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
    public function test_partnershipdistribution_model_get()
    {
        $result = AbstractPartnershipDistributionService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_partnershipdistribution_get_all()
    {
        $result = AbstractPartnershipDistributionService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_partnershipdistribution_get_paginated()
    {
        $result = AbstractPartnershipDistributionService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_partnershipdistribution_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipdistribution_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipdistribution_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipDistribution\PartnershipDistributionRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipdistribution_event_description_filter()
    {
        try {
            $request = new Request(
                [
                'description'  =>  'a'
                ]
            );

            $filter = new PartnershipDistributionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipdistribution_event_terms_filter()
    {
        try {
            $request = new Request(
                [
                'terms'  =>  'a'
                ]
            );

            $filter = new PartnershipDistributionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipdistribution_event_leo_engineer_count_filter()
    {
        try {
            $request = new Request(
                [
                'leo_engineer_count'  =>  '1'
                ]
            );

            $filter = new PartnershipDistributionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipdistribution_event_devops_engineer_count_filter()
    {
        try {
            $request = new Request(
                [
                'devops_engineer_count'  =>  '1'
                ]
            );

            $filter = new PartnershipDistributionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipdistribution_event_software_engineer_count_filter()
    {
        try {
            $request = new Request(
                [
                'software_engineer_count'  =>  '1'
                ]
            );

            $filter = new PartnershipDistributionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipdistribution_event_sales_engineer_count_filter()
    {
        try {
            $request = new Request(
                [
                'sales_engineer_count'  =>  '1'
                ]
            );

            $filter = new PartnershipDistributionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipdistribution_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipDistributionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipdistribution_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipDistributionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipdistribution_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipDistributionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipdistribution_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipDistributionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipdistribution_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipDistributionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipdistribution_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipDistributionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipdistribution_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipDistributionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipdistribution_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipDistributionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipdistribution_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipDistributionQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipDistribution::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}