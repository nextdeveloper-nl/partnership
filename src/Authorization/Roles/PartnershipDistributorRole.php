<?php

namespace NextDeveloper\Partnership\Authorization\Roles;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use NextDeveloper\CRM\Database\Models\AccountManagers;
use NextDeveloper\IAM\Authorization\Roles\AbstractRole;
use NextDeveloper\IAM\Authorization\Roles\IAuthorizationRole;
use NextDeveloper\IAM\Database\Models\Users;
use NextDeveloper\IAM\Helpers\UserHelper;

class PartnershipDistributorRole extends AbstractRole implements IAuthorizationRole
{
    public const NAME = 'partnership-distributor';

    public const LEVEL = 120;

    public const DESCRIPTION = 'Partnership distributors are privileged accounts who can decide who to work with or' .
    ' not. They can approve or reject partnership requests. They can also cancel partnership agreements.';

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
        /**
         * Here user will be able to list all models, because by default, sales manager can see everybody.
         */

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
            'partnership_distribution:read',
            'partnership_distribution:create',
            'partnership_distribution:update',
            'partnership_distribution:delete',
            'partnership_distribution:approve',
            'partnership_distribution:reject',
            'partnership_distribution:cancel',
            'partnership_marketing:read',
            'partnership_marketing:create',
            'partnership_marketing:update',
            'partnership_marketing:delete',
            'partnership_marketing:approve',
            'partnership_marketing:reject',
            'partnership_marketing:cancel',
            'partnership_production:read',
            'partnership_production:create',
            'partnership_production:update',
            'partnership_production:delete',
            'partnership_production:approve',
            'partnership_production:reject',
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
}
