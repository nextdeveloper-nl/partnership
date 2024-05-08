<?php

namespace NextDeveloper\Partnership\Actions\Accounts;

use NextDeveloper\Commons\Actions\AbstractAction;
use NextDeveloper\Partnership\Database\Models\Accounts;

class CalculateStatistics extends AbstractAction
{
    public const EVENTS = [

    ];

    public const PARAMETERS = [];

    public function __construct(Accounts $accounts, $sinceDays = 30)
    {

    }

    public function handle()
    {
    }
}
