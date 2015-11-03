<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 03.11.2015
 * Time: 3:31
 */

namespace app\Models\ModelsInterfaces\Impl;


use App\Models\ModelsInterfaces\Collection;
use App\Models\ModelsInterfaces\ITag;
use App\Models\Tag;

class TagImpl implements ITag
{

    /**
     * @return Collection
     */
    public function getAll()
    {
        // TODO: Implement getAll() method.
        return Tag::all();
    }

    /**
     * @return Collection
     */
    public function getAllActive()
    {
        // TODO: Implement getAllActive() method.
    }

    /**
     * @param Tag $tag
     * @return bool
     */
    public function delete(Tag $tag)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param Tag $tag
     * @return bool
     */
    public function update(Tag $tag)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param array $params
     * @return Tag
     */
    public function create(array $params)
    {
        // TODO: Implement create() method.
    }

    /**
     * @param $id
     * @return Tag
     */
    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    /**
     * @param $newsId
     * @return Collection
     */
    public function getByNewsId($newsId)
    {
        // TODO: Implement getByNewsId() method.
    }
}