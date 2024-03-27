<?php

namespace NextDeveloper\Partnership\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Partnership\Database\Models\DistributionsPerspective;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Partnership\Http\Transformers\AbstractTransformers\AbstractDistributionsPerspectiveTransformer;

/**
 * Class DistributionsPerspectiveTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Partnership\Http\Transformers
 */
class DistributionsPerspectiveTransformer extends AbstractDistributionsPerspectiveTransformer
{

    /**
     * @param DistributionsPerspective $model
     *
     * @return array
     */
    public function transform(DistributionsPerspective $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('DistributionsPerspective', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('DistributionsPerspective', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
