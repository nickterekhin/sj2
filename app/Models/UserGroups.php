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
    protected $fillable = ['GroupName','Permissions'];

    protected static $userModel = 'App\Models\Users';

    /**
     * @param int $ugroup
     */
    public function setUgroup($ugroup)
    {
        $this->ugroup = $ugroup;
    }

    /**
     * @param string $GroupName
     */
    public function setGroupName($GroupName)
    {
        $this->GroupName = $GroupName;
    }

    /**
     * @param string $Permissions
     */
    public function setPermissions($Permissions)
    {
        $this->Permissions = $Permissions;
    }

    public function getId()
    {
        return $this->getKey();
    }

    public function getPermissions()
    {
        return $this->Permissions;
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

    /**
     * @param string $permission
     * @param string $needles
     * @return bool
     */
    function isInPermission($permission, $needles)
    {
        $perms_arr = explode("|",$permission);
        return in_array($needles,$perms_arr);
    }

}