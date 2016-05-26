<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PaginaRepository;
use App\Model\Pagina;
use App\Validators\PaginaValidator;

/**
 * Class PaginaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaginaRepositoryEloquent extends BaseRepository implements PaginaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pagina::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
