<?php

namespace NextDeveloper\Partnership\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Partnership\Database\Models\Distributions;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Partnership\Http\Transformers\AbstractTransformers\AbstractDistributionsTransformer;

/**
 * Class DistributionsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Partnership\Http\Transformers
 */
class DistributionsTransformer extends AbstractDistributionsTransformer
{

    /**
     * @param Distributions $model
     *
     * @return array
     */
    public function transform(Distributions $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Distributions', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Distributions', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
