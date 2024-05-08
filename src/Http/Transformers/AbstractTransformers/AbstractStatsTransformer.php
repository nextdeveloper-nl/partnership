<?php

namespace NextDeveloper\Partnership\Http\Transformers\AbstractTransformers;

use NextDeveloper\Partnership\Database\Models\Stats;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class StatsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Partnership\Http\Transformers
 */
class AbstractStatsTransformer extends AbstractTransformer
{

    /**
     * @param Stats $model
     *
     * @return array
     */
    public function transform(Stats $model)
    {
                        $partnershipAccountId = \NextDeveloper\Partnership\Database\Models\Accounts::where('id', $model->partnership_account_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'partnership_account_id'  =>  $partnershipAccountId ? $partnershipAccountId->uuid : null,
            'date'  =>  $model->date,
            'sales_count'  =>  $model->sales_count,
            'visitor_count'  =>  $model->visitor_count,
            'customer_count'  =>  $model->customer_count,
            'subscription_count'  =>  $model->subscription_count,
            'product_count'  =>  $model->product_count,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
