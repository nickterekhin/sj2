<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 02.12.2015
 * Time: 19:05
 */

namespace App\Dobby\ModelProviders\Impl;


use App\Dobby\ModelProviders\IUserGroups;
use App\Models\UserGroups;
use Illuminate\Database\Eloquent\Collection;

class UserGroupModelImpl implements IUserGroups
{

    /**
     * @param array $groupOptions
     * @return UserGroups
     */
    function create($groupOptions)
    {
        $ug = new UserGroups($groupOptions);

        if($ug->save())
            return $ug;

        return null;
    }

    /**
     * @param int $id
     * @return UserGroups
     */
    function getById($id)
    {
        return UserGroups::find($id);
    }

    /**
     * @param string $groupName
     * @return UserGroups
     */
    function getByNme($groupName)
    {
        // TODO: Implement getByNme() method.
    }

    /**
     * @param $groupId
     * @return array()
     */
    function getPermissionsByGroupId($groupId)
    {
            return explode("|",UserGroups::select("permission")->where("ugroup","=",$groupId)->get());
    }

    /**
     * @return Collection
     */
    function getAll()
    {
        return UserGroups::all();
    }

    /**
     * @return Collection
     */
    function getAllActive()
    {
        // TODO: Implement getAllActive() method.
    }

    /**
     * @param UserGroups $ug
     * @return bool
     */
    function delete(UserGroups $ug)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param UserGroups $ug
     * @return bool
     */
    function update(UserGroups $ug)
    {
        return $ug->update();
    }

}