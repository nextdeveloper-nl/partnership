<?php

namespace NextDeveloper\Partnership\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Partnership\Database\Filters\PartnershipAccountQueryFilter;
use NextDeveloper\Partnership\Services\AbstractServices\AbstractPartnershipAccountService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait PartnershipAccountTestTraits
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

    public function test_http_partnershipaccount_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/partnership/partnershipaccount',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_partnershipaccount_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/partnership/partnershipaccount', [
            'form_params'   =>  [
                'partner_code'  =>  'a',
                'iban'  =>  'a',
                'suspension_reason'  =>  'a',
                'industry'  =>  'a',
                'meeting_link'  =>  'a',
                'customer_count'  =>  '1',
                'level'  =>  '1',
                'reward_points'  =>  '1',
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
    public function test_partnershipaccount_model_get()
    {
        $result = AbstractPartnershipAccountService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_partnershipaccount_get_all()
    {
        $result = AbstractPartnershipAccountService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_partnershipaccount_get_paginated()
    {
        $result = AbstractPartnershipAccountService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_partnershipaccount_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_partnershipaccount_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::first();

            event(new \NextDeveloper\Partnership\Events\PartnershipAccount\PartnershipAccountRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_partner_code_filter()
    {
        try {
            $request = new Request(
                [
                'partner_code'  =>  'a'
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_iban_filter()
    {
        try {
            $request = new Request(
                [
                'iban'  =>  'a'
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_suspension_reason_filter()
    {
        try {
            $request = new Request(
                [
                'suspension_reason'  =>  'a'
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_industry_filter()
    {
        try {
            $request = new Request(
                [
                'industry'  =>  'a'
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_meeting_link_filter()
    {
        try {
            $request = new Request(
                [
                'meeting_link'  =>  'a'
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_customer_count_filter()
    {
        try {
            $request = new Request(
                [
                'customer_count'  =>  '1'
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_level_filter()
    {
        try {
            $request = new Request(
                [
                'level'  =>  '1'
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_reward_points_filter()
    {
        try {
            $request = new Request(
                [
                'reward_points'  =>  '1'
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_partnershipaccount_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new PartnershipAccountQueryFilter($request);

            $model = \NextDeveloper\Partnership\Database\Models\PartnershipAccount::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}