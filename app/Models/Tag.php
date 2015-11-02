<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tag
 *
 * @property integer $id
 * @property string $TagName
 * @property boolean $active
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereTagName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereActive($value)
 */
class Tag extends \Eloquent
{
    protected $table='tags';
    public $timestamps = false;
    protected $fillable=['TagName','active'];

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
     * @return string
     */
    public function getTagName()
    {
        return $this->TagName;
    }

    /**
     * @param string $TagName
     */
    public function setTagName($TagName)
    {
        $this->TagName = $TagName;
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

}
