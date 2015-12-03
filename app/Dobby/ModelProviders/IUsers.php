<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 07.09.2015
 * Time: 21:25
 */

namespace App\Dobby\ModelProviders;


use App\Models\Users;
use Illuminate\Database\Eloquent\Collection;

interface IUsers
{
    /**
     * @param array $userOptions
     * @return Users
     */
    public function create($userOptions);

    /**
     * @param int $Id
     * @return Users
     */
    public function getById($Id);

    /**
     * @param string $name
     * @return Users
     */
    public function getByName($name);

    /**
     * @return Collection
     */
    public function getAll();

    /**
     * @param $password
     * @param $loginName
     * @param $flag
     * @return Users
     */
    public function getUserByCredential($password,$loginName,$flag);

    /**
     * @param Users $user
     * @return bool
     */
    public function delete(Users $user);

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById($id);

    /**
     * @param string $permsString
     * @return array();
     */
    public function getPermissions($permsString);

    /**
     * @param Users $user
     * @return bool
     */
    public function update(Users $user);

    /**
     * @param int $id
     * @return bool
     */
    public function getUserState($id);

}