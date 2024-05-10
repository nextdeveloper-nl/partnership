<?php

namespace NextDeveloper\Partnership\Actions\Accounts;

use NextDeveloper\Commons\Actions\AbstractAction;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;
use NextDeveloper\Partnership\Database\Models\Accounts;
use NextDeveloper\Partnership\Database\Models\Affiliates;
use NextDeveloper\Partnership\Database\Models\Stats;

class CalculateCustomerStatistics extends AbstractAction
{
    public const EVENTS = [

    ];

    public const PARAMETERS = [];

    private $sinceDays;

    // Constructor
    public function __construct(Accounts $accounts, int $sinceDays = 30)
    {
        parent::__construct();
        $this->model = $accounts;
        $this->action = $this->getAction();
        $this->sinceDays = $sinceDays;
    }

    // Main method to handle the action
    public function handle()
    {
        $this->setProgress(0, 'Calculating customer statistics');

        // If sinceDays is 0, calculate statistics for today only
        if ($this->sinceDays == 0) {
            $customers = Affiliates::withoutGlobalScope(AuthorizationScope::class)
                ->where('partner_account_id', $this->model->id)
                ->whereDate('created_at', now())
                ->count();

            $this->updateOrCreateStats(now(), $customers);

            $this->setProgress(100, 'Customer statistics calculation completed');
            $this->setFinished();
            return;
        }

        // Loop through each day to calculate statistics
        for ($i = 1; $i <= $this->sinceDays; $i++) {
            $date = now()->subDays($i);
            $customers = Affiliates::withoutGlobalScope(AuthorizationScope::class)
                ->where('partner_account_id', $this->model->id)
                ->whereDate('created_at', $date)
                ->count();

            $this->updateOrCreateStats($date, $customers);

            $this->setProgress(($i + 1) * 100 / $this->sinceDays, "{$customers} customer(s) created on {$date} calculated");
        }

        $this->setProgress(100, "Customer statistics calculation completed");
        $this->setFinished();
    }

    // Helper method to update or create stats entry
    private function updateOrCreateStats($date, $customers)
    {
        Stats::withoutGlobalScope(AuthorizationScope::class)
            ->updateOrCreate(
                [
                    'partnership_account_id' => $this->model->id,
                    'date' => $date,
                ],
                ['customer_count' => $customers]
            );
    }
}
