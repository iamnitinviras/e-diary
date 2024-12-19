<?php

namespace App\Repositories;
use App\Models\Notes;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;


/**
 * Class FoodCategoryRepository.
 */
class NotesRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Notes::class;
    }

    public function getQuery($params)
    {
        return $this->model;
    }

    public function getBlogs($params)
    {

        $table = $this->model->getTable();
        $restaurants = $this->getQuery($params)->with('category')->sortable(['id' => 'desc'])->when(isset($params['filter']), function ($q) use ($params, $table) {
            $q->where(function ($query) use ($params, $table) {
                $query->where("$table.title", 'like', '%' . $params['filter'] . '%');
                $query->orWhere("$table.id", '=',  $params['filter']);
            });
        })->select('*')->get();

        return $restaurants;
    }
}
