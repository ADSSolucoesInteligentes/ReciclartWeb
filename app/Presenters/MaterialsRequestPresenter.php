<?php

namespace App\Presenters;

use App\Transformers\MaterialsRequestTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MaterialsRequestPresenter.
 *
 * @package namespace App\Presenters;
 */
class MaterialsRequestPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MaterialsRequestTransformer();
    }
}
