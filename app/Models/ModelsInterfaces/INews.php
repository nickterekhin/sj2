<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 03.11.2015
 * Time: 0:42
 */

namespace App\Models\ModelsInterfaces;


use App\Models\News;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface INews
 * @package App\Models\ModelsInterfaces
 */
interface INews
{
    /**
     * @return Collection
     */
    public function getAll();

    /**
     * @return Collection
     */
    public function getAllActive();

    /**
     * @param array $params
     * @return News
     */
    public function create(array $params);

    /**
     * @param News $news
     * @return bool
     */
    public function delete(News $news);

    /**
     * @param News $news
     * @return bool
     */
    public function update(News $news);

    /**
     * @param $id
     * @return News
     */
    public function getById($id);
}