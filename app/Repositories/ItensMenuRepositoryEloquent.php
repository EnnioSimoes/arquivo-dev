<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ItensMenuRepository;
use App\Model\ItensMenu;
use App\Validators\ItensMenuValidator;

/**
 * Class ItensMenuRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ItensMenuRepositoryEloquent extends BaseRepository implements ItensMenuRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ItensMenu::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
