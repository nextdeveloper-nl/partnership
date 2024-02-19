<?php

namespace NextDeveloper\Partnership\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Partnership\Database\Models\Productions;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Partnership\Http\Transformers\AbstractTransformers\AbstractProductionsTransformer;

/**
 * Class ProductionsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Partnership\Http\Transformers
 */
class ProductionsTransformer extends AbstractProductionsTransformer
{

    /**
     * @param Productions $model
     *
     * @return array
     */
    public function transform(Productions $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Productions', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Productions', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
