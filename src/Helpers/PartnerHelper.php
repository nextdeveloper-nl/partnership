<?php

namespace NextDeveloper\Partnership\Helpers;

use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;
use NextDeveloper\IAM\Helpers\UserHelper;
use NextDeveloper\Partnership\Database\Models\Accounts;

class PartnerHelper
{
    public static function amIPartner() : bool
    {
        $me = UserHelper::me();

        //  Checking if my account has a partnership record
        $partnerRecord = Accounts::withoutGlobalScope(AuthorizationScope::class)
            ->where('iam_account_id', UserHelper::currentAccount()->id)
            ->first();

        if($partnerRecord)
            return true;

        return false;
    }
}
