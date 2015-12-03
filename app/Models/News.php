<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\News
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $CategoryId
 * @property string $Title
 * @property string $NewsText
 * @property string $shortText
 * @property integer $date
 * @property boolean $isTop
 * @property boolean $isArchive
 * @property integer $editBy
 * @property boolean $isDef_photo
 * @property string $imageExt
 * @property string $default_photo
 * @property string $seo_description
 * @property string $seo_keywords
 * @property boolean $active
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereUid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereNewsText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereShortText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereIsTop($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereIsArchive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereEditBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereIsDefPhoto($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereImageExt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereDefaultPhoto($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereSeoDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereSeoKeywords($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereActive($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read \App\Models\NewsCategory $category
 */
class News extends \Eloquent
{
    protected $table='news';
    public $timestamps = false;
    protected $fillable=['uid','CategoryId','Title','NewsText','shortText','date','isTop','isArchive','editBy','isDef_photo','imageExt','default_photo','seo_description','seo_keywords','active'];

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
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param int $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->CategoryId;
    }

    /**
     * @param int $CategoryId
     */
    public function setCategoryId($CategoryId)
    {
        $this->CategoryId = $CategoryId;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * @param string $Title
     */
    public function setTitle($Title)
    {
        $this->Title = $Title;
    }

    /**
     * @return string
     */
    public function getNewsText()
    {
        return $this->NewsText;
    }

    /**
     * @param string $NewsText
     */
    public function setNewsText($NewsText)
    {
        $this->NewsText = $NewsText;
    }

    /**
     * @return string
     */
    public function getShortText()
    {
        return $this->shortText;
    }

    /**
     * @param string $shortText
     */
    public function setShortText($shortText)
    {
        $this->shortText = $shortText;
    }

    /**
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return boolean
     */
    public function isIsTop()
    {
        return $this->isTop;
    }

    /**
     * @param boolean $isTop
     */
    public function setIsTop($isTop)
    {
        $this->isTop = $isTop;
    }

    /**
     * @return boolean
     */
    public function isIsArchive()
    {
        return $this->isArchive;
    }

    /**
     * @param boolean $isArchive
     */
    public function setIsArchive($isArchive)
    {
        $this->isArchive = $isArchive;
    }

    /**
     * @return int
     */
    public function getEditBy()
    {
        return $this->editBy;
    }

    /**
     * @param int $editBy
     */
    public function setEditBy($editBy)
    {
        $this->editBy = $editBy;
    }

    /**
     * @return boolean
     */
    public function isIsDefPhoto()
    {
        return $this->isDef_photo;
    }

    /**
     * @param boolean $isDef_photo
     */
    public function setIsDefPhoto($isDef_photo)
    {
        $this->isDef_photo = $isDef_photo;
    }

    /**
     * @return string
     */
    public function getImageExt()
    {
        return $this->imageExt;
    }

    /**
     * @param string $imageExt
     */
    public function setImageExt($imageExt)
    {
        $this->imageExt = $imageExt;
    }

    /**
     * @return string
     */
    public function getDefaultPhoto()
    {
        return $this->default_photo;
    }

    /**
     * @param string $default_photo
     */
    public function setDefaultPhoto($default_photo)
    {
        $this->default_photo = $default_photo;
    }

    /**
     * @return string
     */
    public function getSeoDescription()
    {
        return $this->seo_description;
    }

    /**
     * @param string $seo_description
     */
    public function setSeoDescription($seo_description)
    {
        $this->seo_description = $seo_description;
    }

    /**
     * @return string
     */
    public function getSeoKeywords()
    {
        return $this->seo_keywords;
    }

    /**
     * @param string $seo_keywords
     */
    public function setSeoKeywords($seo_keywords)
    {
        $this->seo_keywords = $seo_keywords;
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

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','news_tags','NewsId','TagsIc');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\NewsCategory','CategoryId');
    }

}
