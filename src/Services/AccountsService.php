<?php

namespace NextDeveloper\Partnership\Services;

use Illuminate\Support\Str;
use NextDeveloper\IAM\Database\Models\Users;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;
use NextDeveloper\IAM\Helpers\RoleHelper;
use NextDeveloper\IAM\Helpers\UserHelper;
use NextDeveloper\Partnership\Database\Models\Accounts;
use NextDeveloper\Partnership\Services\AbstractServices\AbstractAccountsService;

/**
 * This class is responsible from managing the data for Accounts
 *
 * Class AccountsService.
 *
 * @package NextDeveloper\Partnership\Database\Models
 */
class AccountsService extends AbstractAccountsService
{

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
    public static function myAccount()
    {

    }

    public static function create($data)
    {
        $account = Accounts::withoutGlobalScope(AuthorizationScope::class)
            ->where('iam_account_id', UserHelper::currentAccount()->id)
            ->first();

        if ($account) {
            self::addPartnerRoles($account);
            return $account;
        }

        $codeNotValid = true;
        $randomString = '';

        while ($codeNotValid) {
            $randomString = Str::random(10);

            $exists = Accounts::withoutGlobalScopes()
                ->where('partner_code', $randomString)
                ->first();

            if (!$exists)
                $codeNotValid = false;
        }

        $data['partner_code'] = $randomString;

        RoleHelper::addUserToRole(UserHelper::me(), 'partnership-user');

        $model = parent::create($data);

        return $model;
    }

    public static function update($id, $data)
    {
        if (class_exists('\NextDeveloper\Accounting\Database\Models\Accounts')) {
            $accountingAccount = \NextDeveloper\Accounting\Database\Models\Accounts::withoutGlobalScope(
                AuthorizationScope::class
            )
                ->where('iam_account_id', UserHelper::currentAccount()->id)
                ->first();

            $accountingData = [];

            if(array_key_exists('is_integrator', $data) && $data['is_integrator']) {
                $accountingData['is_integrator'] = $data['is_integrator'];
            }

            if(array_key_exists('is_reseller', $data) && $data['is_reseller']) {
                $accountingData['is_reseller'] = $data['is_reseller'];
            }

            if(array_key_exists('is_affiliate', $data) && $data['is_affiliate']) {
                $accountingData['is_affiliate'] = $data['is_affiliate'];
            }

            if(array_key_exists('is_vendor', $data) && $data['is_vendor']) {
                $accountingData['is_vendor'] = $data['is_vendor'];
            }

            if (count($accountingData) > 0) {
                $accountingAccount->updateQuietly($accountingData);
            }
        }

        return parent::update($id, $data);
    }

    private static function addPartnerRoles(Accounts $accounts)
    {
        $iamAccount = \NextDeveloper\IAM\Database\Models\Accounts::withoutGlobalScope(
            AuthorizationScope::class
        )
            ->where('id', $accounts->iam_account_id)
            ->first();

        $user = Users::withoutGlobalScope(AuthorizationScope::class)
            ->where('id', $iamAccount->iam_user_id)
            ->first();

        if ($user) {
            RoleHelper::addUserToRole($user, 'partnership-user');
        }
    }
}
