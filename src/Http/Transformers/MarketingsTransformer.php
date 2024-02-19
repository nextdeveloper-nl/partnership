<?php

namespace NextDeveloper\Partnership\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Partnership\Database\Models\Marketings;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Partnership\Http\Transformers\AbstractTransformers\AbstractMarketingsTransformer;

/**
 * Class MarketingsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Partnership\Http\Transformers
 */
class MarketingsTransformer extends AbstractMarketingsTransformer
{

    /**
     * @param Marketings $model
     *
     * @return array
     */
    public function transform(Marketings $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Marketings', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Marketings', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
