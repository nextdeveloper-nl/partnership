<?php

namespace NextDeveloper\Partnership\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Partnership\Database\Models\Affiliates;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Partnership\Http\Transformers\AbstractTransformers\AbstractCustomersTransformer;

/**
 * Class CustomersTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Partnership\Http\Transformers
 */
class CustomersTransformer extends AbstractCustomersTransformer
{

    /**
     * @param Affiliates $model
     *
     * @return array
     */
    public function transform(Affiliates $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Customers', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Customers', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
