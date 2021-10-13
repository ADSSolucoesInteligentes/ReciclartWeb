<?php

namespace App\Presenters;

use App\Transformers\MateriaiTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MateriaiPresenter.
 *
 * @package namespace App\Presenters;
 */
class MateriaiPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MateriaiTransformer();
    }
}
