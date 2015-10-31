<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 07.09.2015
 * Time: 21:48
 */

namespace App\Dobby\ModelProviders\Impl;


use App\Dobby\ModelProviders\IUsers;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class UsersModelImpl implements IUsers
{
    private $user;
    private $userModel = 'App\Models\Users';
    private $model;

    /**
     *
     */
    public function __construct()
    {
        $model = '\\'.ltrim($this->userModel, '\\');
        $this->model=new Users;
    }
    public function createUser($user)
    {

    }

    public function findUserById($Id)
    {
        // TODO: Implement findUserById() method.
    }

    public function findUserByName($name)
    {
        // TODO: Implement findUserByName() method.
    }

    public function getAllUsers()
    {
        // TODO: Implement getAllUsers() method.
    }

    /**
     * @param $password
     * @param $loginName
     * @param bool $flag
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getUserByCredential($password, $loginName, $flag = null)
    {
        if($flag==null)
        {
            $flag=false;
        }
        \Debugbar::info($flag);
        // TODO: Implement getUserByCredential() method.
        if(!$flag) {
            $user = $this->model->newQuery()->with('getGroup')->where('email', '=', $loginName)->where('Active', '=', 1)->first();

            if ($user != null) {
                if (\Hash::check($password, $user->getPassword())) {
                    \Debugbar::addMessage('hash matches - ' . Hash::make($password));
                    return $user;
                } else {
                    \Debugbar::addMessage('hash dose not match');
                    return null;
                }
            } else {
                return null;
            }
        }
        else
        {
            $user = $this->model->newQuery()->with('getGroup')->where('Password','=',$password)->where('email', '=', $loginName)->where('Active', '=', 1)->first();
            if($user!=null)
            {
                return $user;
            }
            else
            {
                return null;
            }
        }
    }

    public function deleteUser($user)
    {
        // TODO: Implement deleteUser() method.
    }

    public function deleteUserById()
    {
        // TODO: Implement deleteUserById() method.
    }

    public function createModel()
    {
        $model = '\\'.ltrim($this->userModel, '\\');
        $this->model=new Users;
    }
}