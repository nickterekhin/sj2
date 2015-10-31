<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 06.09.2015
 * Time: 22:36
 */

namespace App\Models;



/**
 * App\Models\Users
 *
 * @property-read \static::$userGroupsModel $group
 * @property integer $uid
 * @property integer $ugroup
 * @property string $FirstName
 * @property string $LastName
 * @property string $UserName
 * @property string $email
 * @property string $Password
 * @property boolean $Active
 * @property integer $RegData
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users whereUid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users whereUgroup($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users whereUserName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users whereRegData($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users whereUpdatedAt($value)
 */
class Users extends \Eloquent
{
    protected $table = 'users';
    protected $primaryKey = 'uid';
    protected $userGroup;
    protected static $userGroupsModel = 'App\Models\UserGroups';


    public function getId()
    {
        return $this->getKey();
    }

    public function getLogin()
    {
        return $this->{'email'};
    }

    public function getPassword()
    {
        return $this->{'Password'};
    }

    public function isActivate()
    {
        return (bool)$this->Active;
    }
    public function getGroupName()
    {
        return $this->getGroup->GroupName;
    }
    public function getFullName()
    {
        return $this->FirstName." ".$this->LastName;
    }
    public function getKeyName()
    {
        return "uid";
    }
    public function getUserGroup()
    {
        return $this->get_group->GroupName;
    }
    /*------------Groups------------*/

    public function getGroup(){
        if(!$this->userGroup) {
            $this->userGroup = $this->group();
        }
        return $this->userGroup;
    }

    public function group()
    {
        return $this->belongsTo(static::$userGroupsModel,'ugroup');
    }

    public function getPermissions()
    {

    }




}