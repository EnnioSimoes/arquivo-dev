<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SiteRepository;
use App\Model\Site;
use App\Validators\SiteValidator;

/**
 * Class SiteRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SiteRepositoryEloquent extends BaseRepository implements SiteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Site::class;
    }

    /**
     * [listSiteUser description]
     * @param  Integer $id Id do usuário autenticado
     * @return Object Collection     Objeto com array items contendo referência id => nome
     */
    public function listSiteUser($id)
    {
        $data = $this->model->where(['cadastro_usuario_id' => $id])->lists('nome', 'id');
        return $data;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
