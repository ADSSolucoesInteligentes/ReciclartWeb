<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Materiai;

/**
 * Class MateriaiTransformer.
 *
 * @package namespace App\Transformers;
 */
class MateriaiTransformer extends TransformerAbstract
{
    /**
     * Transform the Materiai entity.
     *
     * @param \App\Entities\Materiai $model
     *
     * @return array
     */
    public function transform(Materiai $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
