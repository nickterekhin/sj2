<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 02.12.2015
 * Time: 19:02
 */

namespace App\Dobby\ModelProviders;


use App\Models\UserGroups;
use Illuminate\Database\Eloquent\Collection;

interface IUserGroups
{
    /**
     * @param array $groupOptions
     * @return UserGroups
     */
    function create($groupOptions);

    /**
     * @param int $id
     * @return UserGroups
     */
    function getById($id);

    /**
     * @param string $groupName
     * @return UserGroups
     */
    function getByNme($groupName);

    /**
     * @param $groupId
     * @return array()
     */
    function getPermissionsByGroupId($groupId);

    /**
     * @return Collection
     */
    function getAll();

    /**
     * @return Collection
     */
    function getAllActive();

    /**
     * @param UserGroups $ug
     * @return bool
     */
    function delete(UserGroups $ug);

    /**
     * @param UserGroups $ug
     * @return bool
     */
    function update(UserGroups $ug);

}