<?php

namespace App\Presenters;

use App\Transformers\PedidoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PedidoPresenter.
 *
 * @package namespace App\Presenters;
 */
class PedidoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PedidoTransformer();
    }
}
