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
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UsersModelImpl implements IUsers
{
    private $user;
    private $userModel = 'App\Models\Users';
    private $model;


    public function __construct()
    {
        $model = '\\'.ltrim($this->userModel, '\\');
        $this->model=new Users;
    }


    /**
     * @param $password
     * @param $loginName
     * @param bool $flag
     * @return Users
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
            $user = $this->model->newQuery()->with('getGroup')->where('email', '=', $loginName)->where('ugroup','!=',2)->where('Active', '=', 1)->first();

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

    /**
     * @param $permsString
     * @return array
     */
    public function getPermissions($permsString)
    {

        /*$permissions = array();
        foreach($user_rigts as $val)
            $permissions[$val]=1;*/

        return explode("|",$permsString);
    }


    /**
     * @param array $userOptions
     * @return Users
     */
    public function create($userOptions)
    {
        $user = new Users($userOptions);
        $user->save();
        return $user;
    }

    /**
     * @param int $Id
     * @return Users
     */
    public function getById($Id)
    {
        return Users::find($Id);
    }

    /**
     * @param string $name
     * @return Users
     */
    public function getByName($name)
    {
        // TODO: Implement findByName() method.
    }

    /**
     * @return Collection
     */
    public function getAll()
    {
        return Users::select(array("users.*","usergroups.*"))->leftJoin('usergroups','users.ugroup','=','usergroups.ugroup')->get();
    }

    /**
     * @param Users $user
     * @return bool
     */
    public function delete(Users $user)
    {
        if ($user->getId()==1) return false;
        return $user->delete();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
    }

    /**
     * @param Users $user
     * @return bool
     */
    public function  update(Users $user)
    {
        if ($user->getId()==1 && session('user')->getId()!=1) return false;
        return $user->update();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function getUserState($id)
    {

        $userState = Users::select("Active")->where("uid", "=", $id)->get()->first();
        if($userState==null)
            return false;
        if(!$userState->Active)
            return false;

        return true;
    }
}