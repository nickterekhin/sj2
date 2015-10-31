<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 06.09.2015
 * Time: 22:48
 */

namespace App\Models;


/**
 * App\Models\UserGroups
 *
 * @property integer $ugroup
 * @property string $GroupName
 * @property string $Permissions
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserGroups whereUgroup($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserGroups whereGroupName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserGroups wherePermissions($value)
 */
class UserGroups extends \Eloquent
{
    protected $table='usergroups';
    protected $primaryKey = 'ugroup';
    public $timestamps = false;

    protected static $userModel = 'App\Models\Users';

    public function getId()
    {
        return $this->getKey();
    }

    public function getPermissions()
    {
        return preg_split('/\|/',$this->Permissions);
    }

    public function getGroupName()
    {
        return $this->GroupName;
    }



    public function getUsers()
    {
        return $this->hasMany(static::$userModel,'ugroup','ugroup');
    }

    public function getKeyName()
    {
        return 'ugroup';
    }


}