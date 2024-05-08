<?php

namespace NextDeveloper\Partnership\Http\Transformers\AbstractTransformers;

use NextDeveloper\Partnership\Database\Models\Customers;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class CustomersTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Partnership\Http\Transformers
 */
class AbstractCustomersTransformer extends AbstractTransformer
{

    /**
     * @param Customers $model
     *
     * @return array
     */
    public function transform(Customers $model)
    {
                        $partnerAccountId = \NextDeveloper\\Database\Models\PartnerAccounts::where('id', $model->partner_account_id)->first();
                    $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'partner_account_id'  =>  $partnerAccountId ? $partnerAccountId->uuid : null,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'is_active'  =>  $model->is_active,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
