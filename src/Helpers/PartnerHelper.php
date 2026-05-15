<?php

namespace NextDeveloper\Partnership\Helpers;

use NextDeveloper\Accounting\Database\Models\Partnerships;
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

    public static function getPartnerByCode($partnerCode) : ?Partnerships
    {
        return Partnerships::withoutGlobalScope(AuthorizationScope::class)
            ->where('partner_code', $partnerCode)
            ->first();
    }

    public static function getPartnerByIamAccount(\NextDeveloper\IAM\Database\Models\Accounts $account)
    {
        return Accounts::withoutGlobalScope(AuthorizationScope::class)
            ->where('iam_account_id', $account->id)
            ->first();
    }
}
