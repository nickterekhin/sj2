<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NewsTag
 *
 * @property integer $id
 * @property integer $NewsId
 * @property integer $TagsId
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NewsTag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NewsTag whereNewsId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NewsTag whereTagsId($value)
 */
class NewsTag extends \Eloquent
{
    protected $table='news_tags';
    public $timestamps = false;
    protected $fillable=['NewsId','TagsId'];

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
    public function getNewsId()
    {
        return $this->NewsId;
    }

    /**
     * @param int $NewsId
     */
    public function setNewsId($NewsId)
    {
        $this->NewsId = $NewsId;
    }

    /**
     * @return int
     */
    public function getTagsId()
    {
        return $this->TagsId;
    }

    /**
     * @param int $TagsId
     */
    public function setTagsId($TagsId)
    {
        $this->TagsId = $TagsId;
    }

}
