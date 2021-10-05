<?php

namespace App\Presenters;

use App\Transformers\UsersInfoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UsersInfoPresenter.
 *
 * @package namespace App\Presenters;
 */
class UsersInfoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UsersInfoTransformer();
    }
}
