<?php

namespace NextDeveloper\Partnership\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Partnership\Database\Filters\PartnershipAffiliateQueryFilter;
use NextDeveloper\Partnership\Services\AbstractServices\AbstractPartnershipAffiliateService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait PartnershipAffiliateTestTraits
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

    public function test_http_partnershipaffiliate_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/partnership/partnershipaffiliate',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_partnershipaffiliate_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/partnership/partnershipaffiliate', [
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
    public function test_partnershipaffiliate_model_get()
    {
        $result = AbstractPartnershipAffiliateService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_partnershipaffiliate_get_all()
    {
        $result = AbstractPartnershipAffiliateService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_partnershipaffiliate_get_paginated()
    {
        $result = AbstractPartnershipAffiliateService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_partnershipaffiliate_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaffiliate_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaffiliate_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAffiliate\PartnershipAffiliateRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaffiliate_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipAffiliateQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaffiliate_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipAffiliateQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaffiliate_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipAffiliateQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaffiliate_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipAffiliateQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaffiliate_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipAffiliateQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaffiliate_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipAffiliateQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaffiliate_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipAffiliateQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaffiliate_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipAffiliateQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaffiliate_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipAffiliateQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAffiliate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}