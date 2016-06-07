<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PostRepository;
use App\Model\Post;
use App\Validators\PostValidator;

/**
 * Class PostRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Post::class;
    }

    /**
     * Retorna apenas posts do usuário
     * @param  integer  $id        id do usuario
     * @param  integer $porPagina Quantos posts por pagina
     * @return Object             Objeto do Eloquent para paginação
     */
    public function paginacaoPostUser($id, $porPagina = 9)
    {
        $data = $this->model->where(['cadastro_usuario_id' => $id])->paginate($porPagina);
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
