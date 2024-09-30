<?php

namespace NextDeveloper\Partnership\Authorization\Roles;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use NextDeveloper\CRM\Database\Models\AccountManagers;
use NextDeveloper\IAM\Authorization\Roles\AbstractRole;
use NextDeveloper\IAM\Authorization\Roles\IAuthorizationRole;
use NextDeveloper\IAM\Database\Models\Users;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;
use NextDeveloper\IAM\Helpers\UserHelper;
use NextDeveloper\Partnership\Database\Models\Accounts;

class PartnershipUserRole extends AbstractRole implements IAuthorizationRole
{
    public const NAME = 'partnership-user';

    public const LEVEL = 120;

    public const DESCRIPTION = 'Partnership user can manage his services, marketing and production items. As well as'
    . ' give support to their customer, see their invoices and usages.';

    public const DB_PREFIX = 'partnership';

    /**
     * Applies basic member role sql for Eloquent
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if(
            $model->getTable() == 'partnership_accounts_perspective' ||
            $model->getTable() == 'partnership_accounts'
        ) {
            $builder->where('iam_account_id', UserHelper::currentAccount()->id)
                ->orWhere('is_distributor', true);

            return;
        }

        $builder->where('iam_account_id', UserHelper::currentAccount()->id);
    }

    public function checkPrivileges(Users $users = null)
    {
        //return UserHelper::hasRole(self::NAME, $users);
    }

    public function getModule()
    {
        return 'partnership';
    }

    public function allowedOperations() :array
    {
        return [
            'partnership_accounts:create',
            'partnership_accounts:read',
            'partnership_accounts:update',
            'partnership_distribution:read',
            'partnership_distribution:create',
            'partnership_distribution:update',
            'partnership_distribution:delete',
            'partnership_distribution:cancel',
            'partnership_marketing:read',
            'partnership_marketing:create',
            'partnership_marketing:update',
            'partnership_marketing:delete',
            'partnership_marketing:cancel',
            'partnership_production:read',
            'partnership_production:create',
            'partnership_production:update',
            'partnership_production:delete',
            'partnership_production:cancel'
        ];
    }

    public function getLevel(): int
    {
        return self::LEVEL;
    }

    public function getDescription(): string
    {
        return self::DESCRIPTION;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function canBeApplied($column)
    {
        if(self::DB_PREFIX === '*') {
            return true;
        }

        if(Str::startsWith($column, self::DB_PREFIX)) {
            return true;
        }

        return false;
    }

    public function getDbPrefix()
    {
        return self::DB_PREFIX;
    }

    public function checkRules(Users $users): bool
    {
        // TODO: Implement checkRules() method.
    }
}
