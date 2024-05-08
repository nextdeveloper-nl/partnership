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

    // Constructor
    public function __construct(Accounts $accounts, private $sinceDays = 30)
    {
        // Call parent constructor
        parent::__construct();
        // Assign account and action
        $this->model = $accounts;
        $this->action = $this->getAction();
    }

    // Main method to handle the action
    public function handle()
    {
        // Set initial progress
        $this->setProgress(0, 'Calculating customer statistics');

        // Loop through each day to calculate statistics
        for ($i = 1; $i <= $this->sinceDays; $i++) {
            // Calculate the date
            $date = now()->subDays($i);
            // Count the number of customers created on the current date for the specified account
            $customers = Affiliates::withoutGlobalScope(AuthorizationScope::class)
                ->where('partner_account_id', $this->model->id)
                ->whereDate('created_at', $date)
                ->count();

            // Update or create statistics entry for the current date and account
            Stats::withoutGlobalScope(AuthorizationScope::class)
            ->updateOrCreate(
                [
                    'partnership_account_id' => $this->model->id,
                    'date' => $date,
                ],
                ['customer_count' => $customers]
            );

            // Calculate and update the progress based on the current iteration
            $this->setProgress(($i + 1) * 100 / $this->sinceDays, "{$customers} customer(s) created on {$date} calculated");
        }

        // Set progress to 100% and mark the action as finished
        $this->setProgress(100, "Customer statistics calculation completed");
        $this->setFinished();
    }
}
