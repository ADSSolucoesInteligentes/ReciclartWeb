<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Pedido;

/**
 * Class PedidoTransformer.
 *
 * @package namespace App\Transformers;
 */
class PedidoTransformer extends TransformerAbstract
{
    /**
     * Transform the Pedido entity.
     *
     * @param \App\Entities\Pedido $model
     *
     * @return array
     */
    public function transform(Pedido $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
