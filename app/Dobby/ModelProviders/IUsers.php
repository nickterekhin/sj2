<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 07.09.2015
 * Time: 21:25
 */

namespace App\Dobby\ModelProviders;


interface IUsers
{
    public function createUser($user);
    public function findUserById($Id);
    public function findUserByName($name);
    public function getAllUsers();
    public function getUserByCredential($password,$loginName,$flag);
    public function deleteUser($user);
    public function deleteUserById();

}