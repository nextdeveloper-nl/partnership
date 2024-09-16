<?php

namespace NextDeveloper\Partnership\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Partnership\Database\Models\DistributorsPerspective;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Partnership\Http\Transformers\AbstractTransformers\AbstractDistributorsPerspectiveTransformer;

/**
 * Class DistributorsPerspectiveTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Partnership\Http\Transformers
 */
class DistributorsPerspectiveTransformer extends AbstractDistributorsPerspectiveTransformer
{

    /**
     * @param DistributorsPerspective $model
     *
     * @return array
     */
    public function transform(DistributorsPerspective $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('DistributorsPerspective', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('DistributorsPerspective', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
