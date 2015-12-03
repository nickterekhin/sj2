<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NewsCategory
 *
 * @property integer $id
 * @property integer $ParentId
 * @property string $CategoryName
 * @property integer $position
 * @property boolean $active
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NewsCategory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NewsCategory whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NewsCategory whereCategoryName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NewsCategory wherePosition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NewsCategory whereActive($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\News[] $news
 */
class NewsCategory extends \Eloquent
{
    protected $table='news_categories';
    public $timestamps = false;
    protected $fillable=['ParentId','CategoryName','position','active'];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getParentId()
    {
        return $this->ParentId;
    }

    /**
     * @param int $ParentId
     */
    public function setParentId($ParentId)
    {
        $this->ParentId = $ParentId;
    }

    /**
     * @return string
     */
    public function getCategoryName()
    {
        return $this->CategoryName;
    }

    /**
     * @param string $CategoryName
     */
    public function setCategoryName($CategoryName)
    {
        $this->CategoryName = $CategoryName;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    public function news()
    {
        return $this->hasMany('App\Models\News','CategoryId');
    }
}
