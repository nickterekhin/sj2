<?php

namespace App\Http\Controllers\Admin;

use App\Dobby\ModelProviders\IUserGroups;
use App\Dobby\ModelProviders\IUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    protected $users;
    protected $usergroups;
    protected  $user_rules = array(
        'userGroup'=>'required',
        'UserName'=>'required',
        'FirstName'=>'required',
        'LastName'=>'required',
        'Email'=>'required'
    );

    /**
     * @param IUsers $users
     * @param IUserGroups $userGroups
     */
    function __construct(IUsers $users, IUserGroups $userGroups)
    {
        $this->users = $users;
        $this->usergroups = $userGroups;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users  = $this->users->getAll();
        return view('admin.users.list')->with(array('users'=>$users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usergroups = $this->usergroups->getAll();
        return view('admin.users.create')->with(array('userGroups'=>$usergroups));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->user_rules['Password']='required';

        $validator = \Validator::make($request->all(),$this->user_rules);
        if($validator->fails())
        {
            return \Redirect::route('users.create')->withInput()->withErrors($validator);
        }
        else {
            $active = $request->get('Active');
            $active  = (isset($active)&&$active=='1')?true:false;

            $options = array(
                'ugroup'=>$request->get("userGroup"),
                'FirstName'=>$request->get('FirstName'),
                'LastName'=>$request->get('LastName'),
                'UserName'=>$request->get('UserName'),
                'email'=>$request->get('Email'),
                'Password'=>\Hash::make($request->get('Password')),
                'Active'=>$active,
                'RegDate'=> time()
            );

            $this->users->create($options);
            return \Redirect::route('users.create')->with($this->ShowMessage('Пользователь успешно добавлен.', 'alert-success'));
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usergroups = $this->usergroups->getAll();
        $user = $this->users->getById($id);

        return view('admin.users.edit')->with(array("user"=>$user, "userGroups"=>$usergroups));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = \Validator::make($request->all(),$this->user_rules);
        if($validator->fails())
        {
            return \Redirect::route('users.create')->withInput()->withErrors($validator);
        }
        else {
            $logout = false;
            $active = $request->get('Active');
            $active  = (isset($active)&&$active=='1')?true:false;

            $user = $this->users->getById($id);
            if($user->getEmail()!=$request->get('Email'))
                $logout=true;
            $user->setUgroup($request->get("userGroup"));
            $user->setFirstName($request->get('FirstName'));
            $user->setLastName($request->get('LastName'));
            $user->setUserName($request->get('UserName'));
            $user->setEmail($request->get('Email'));

            if($request->get('Password')!=null && !empty($request->get('Password')))
            {
                if(!\Hash::check($request->get('Password'),$user->getPassword()))
                    $logout=true;

                $user->setPassword(\Hash::make($request->get('Password')));
            }
            $user->setActive($active);


            $this->users->update($user);
            if($logout)
                return \Redirect::route('logout');

            return \Redirect::route('users.edit',array('id'=>$id))->with($this->ShowMessage('Пользователь успешно изменен.', 'alert-success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->users->getById($id);

        if($this->users->delete($user))
            return \Redirect::route('users')->with($this->ShowMessage('Пользователь был успешно удален.', 'alert-success'));

        return \Redirect::route('users')->with($this->ShowMessage('При удаении пользователя, что-то поло не так.', 'alert-danger'));
    }

    /**
     * @param $active
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function openClose($active,$id)
    {
        $user = $this->users->getById($id);
        switch($active)
        {
            case 'open':
                $user->setActive(1);
                break;
            case 'close':
                $user->setActive(0);
                break;

        }
        if($this->users->update($user))
            return \Redirect::route('users')->with($this->ShowMessage('Пользователь был успешно активирован.', 'alert-success'));

        return \Redirect::route('users');
    }
}
