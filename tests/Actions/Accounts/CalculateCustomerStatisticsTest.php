<?php

namespace NextDeveloper\Partnership\Tests\Actions\Accounts;

use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;
use NextDeveloper\Partnership\Actions\Accounts\CalculateCustomerStatistics;
use NextDeveloper\Partnership\Database\Models\Accounts;
use Tests\TestCase;

class CalculateCustomerStatisticsTest extends TestCase
{
    public function test_handle()
    {
        $accounts = Accounts::withoutGlobalScope(AuthorizationScope::class)->first();
        $sinceDays = 30;
        $calculateCustomerStatistics = new CalculateCustomerStatistics($accounts, $sinceDays);
        $calculateCustomerStatistics->handle();

        $this->assertTrue(true);
    }
}
