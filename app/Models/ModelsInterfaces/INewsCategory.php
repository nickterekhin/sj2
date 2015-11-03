<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 03.11.2015
 * Time: 0:45
 */

namespace App\Models\ModelsInterfaces;


use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface INewsCategory
 * @package App\Models\ModelsInterfaces
 */
interface INewsCategory
{
    /**
     * @param $id
     * @return Collection
     */
    public function getById($id);

    /**
     * @param string $prefix
     * @return Collection
     */
    public function getAll($prefix='');

    /**
     * @param string $prefix
     * @return Collection
     */
    public function getAllActive($prefix='');

    /**
     * @param array $params
     * @return NewsCategory
     */
    public function create(array $params);

    /**
     * @param NewsCategory $newsCategory
     * @return bool
     */
    public function delete(NewsCategory $newsCategory);

    /**
     * @param NewsCategory $newsCategory
     * @return bool
     */
    public function update(NewsCategory $newsCategory);

    /**
     * @param $id
     * @param $prefix
     * @param $categories
     * @return Collection
     */
    public function getCategories($id,$prefix,&$categories);
}