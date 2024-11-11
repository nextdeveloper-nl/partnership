<?php

namespace NextDeveloper\Partnership\Services;

use Illuminate\Support\Str;
use NextDeveloper\Commons\Exceptions\NotAllowedException;
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
    public static function myAccount() {

    }

    public static function create($data)
    {
        $account = Accounts::withoutGlobalScope(AuthorizationScope::class)
            ->where('iam_account_id', UserHelper::currentAccount()->id)
            ->first();

        if($account){
            self::addPartnerRoles($account);
            return $account;
        }

        $codeNotValid = true;
        $randomString = '';

        while($codeNotValid) {
            $randomString = Str::random(10);

            $exists = Accounts::withoutGlobalScopes()
                ->where('partner_code', $randomString)
                ->first();

            if(!$exists)
                $codeNotValid = false;
        }

        $data['partner_code'] = $randomString;

        RoleHelper::addUserToRole(UserHelper::me(), 'partnership-user');

        $model = parent::create($data);

        return $model;
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

        if($user) {
            RoleHelper::addUserToRole($user, 'partnership-user');
        }
    }

    /**
     * Update the model from an array.
     *
     * Throws an exception if stuck with any problem.
     *
     * @throws NotAllowedException
     */
    public static function update($id, array $data)
    {
        $model = Accounts::where('uuid', $id)->first();

        if (!$model) {
            throw new NotAllowedException(
                'We cannot find the related object to update. ' .
                'Maybe you dont have the permission to update this object?',
            );
        }

        if ($model->is_approved) {
            $data = static::removeProtectedFields($data);
        }



        return parent::update($id, $data);
    }

    /**
     * List of fields that cannot be modified after approval
     *
     * @return array
     */
    private static function getProtectedFields(): array
    {
        return [
            'partner_code',
            'is_brand_ambassador',
            'payable_income',
            'customer_count',
            'iban',
            'level',
            'reward_points',
            'boosts',
            'mystery_box',
            'badges',
            'is_suspended',
            'suspension_reason',
            'is_approved',
            'is_reseller',
            'is_integrator',
            'is_distributor',
            'is_vendor',
            'distributor_id',
            'meeting_link',
        ];
    }

    /**
     * Remove protected fields from the data array
     *
     * @param array $data Input data array
     * @return array Filtered data array
     */
    private static function removeProtectedFields(array $data): array
    {
        return array_diff_key(
            $data,
            array_flip(static::getProtectedFields()),
        );
    }
}
