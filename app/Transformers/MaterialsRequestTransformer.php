<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\MaterialsRequest;

/**
 * Class MaterialsRequestTransformer.
 *
 * @package namespace App\Transformers;
 */
class MaterialsRequestTransformer extends TransformerAbstract
{
    /**
     * Transform the MaterialsRequest entity.
     *
     * @param \App\Entities\MaterialsRequest $model
     *
     * @return array
     */
    public function transform(MaterialsRequest $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
