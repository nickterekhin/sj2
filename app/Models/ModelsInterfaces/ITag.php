<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 03.11.2015
 * Time: 0:44
 */

namespace App\Models\ModelsInterfaces;


use App\Models\Tag;

/**
 * Interface ITag
 * @package App\Models\ModelsInterfaces
 */
interface ITag
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
     * @param Tag $tag
     * @return bool
     */
    public function delete(Tag $tag);

    /**
     * @param Tag $tag
     * @return bool
     */
    public function update(Tag $tag);

    /**
     * @param array $params
     * @return Tag
     */
    public function create(array $params);

    /**
     * @param $id
     * @return Tag
     */
    public function getById($id);

    /**
     * @param $newsId
     * @return Collection
     */
    public function getByNewsId($newsId);
}