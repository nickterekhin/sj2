<?php

namespace App\Http\Controllers\Admin;

use App\Dobby\ModelProviders\IPermission;
use App\Dobby\ModelProviders\IUserGroups;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserGroupsController extends Controller
{
    protected $userGroups;
    protected $permission;
    protected  $group_rules = array(
        'groupName'=>'required',
    );
    function __construct(IUserGroups $userGroups, IPermission $permission)
    {
        $this->userGroups =$userGroups;
        $this->permission = $permission;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uGroups = $this->userGroups->getAll();
        return view('admin.user-groups.list')->with(array("userGroups"=>$uGroups));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permsList = $this->permission->getAll();

        return view('admin.user-groups.create')->with(array("permsList"=>$permsList));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),$this->group_rules);
        if($validator->fails())
        {
            return \Redirect::route('user-groups.create')->withInput()->withErrors($validator);
        }
        else {
                $permStr = '';
            if($request->get("perms")!=null) {
                foreach ($request->get("perms") as $permsId => $p) {
                    $permStr .= '|' . $p;
                }
            }
            $options = array(
                'GroupName'=>$request->get("groupName"),
                'Permissions'=>$request->get("groupName").$permStr,
            );

            try{
                $this->userGroups->create($options);
                return \Redirect::route('user-groups.create')->with($this->ShowMessage('Группа успешно добавлен.', 'alert-success'));
            }catch (QueryException $e)
            {

                return \Redirect::route('user-groups.create')->withInput()->with($this->ShowMessage('Группа уже существует', 'alert-danger'));
            }


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = $this->userGroups->getById($id);
        $permsList = $this->permission->getAll();
        return view("admin.user-groups.edit")->with(array('group'=>$group,'permsList'=>$permsList));
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
        $validator = \Validator::make($request->all(),$this->group_rules);
        if($validator->fails())
        {
            return \Redirect::route('user-groups.create')->withInput()->withErrors($validator);
        }
        else {
            $permStr = '';
            if($request->get("perms")!=null) {
                foreach ($request->get("perms") as $permsId => $p) {
                    $permStr .= '|' . $p;
                }
            }

            $group = $this->userGroups->getById($id);
            $group->setGroupName($request->get("groupName"));
            $group->setPermissions($request->get("groupName").$permStr);

            try{
                $this->userGroups->update($group);
                return \Redirect::route('user-groups.edit',array('id'=>$id))->with($this->ShowMessage('Группа успешно изменена.', 'alert-success'));
            }catch (QueryException $e)
            {

                return \Redirect::route('user-groups.edit',array('id'=>$id))->withInput()->with($this->ShowMessage($e->getMessage(), 'alert-danger'));
            }


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
        $group = $this->userGroups->getById($id);
        if($group->getId()!=1)
        {
            try{
                $group->delete();
                return \Redirect::route("user-groups")->with($this->ShowMessage('Группа была успешно удаллена','alert-danger'));
            }catch(QueryException $e)
            {
                return \Redirect::route("user-groups")->with($this->ShowMessage('Группа не может быть удалена так как в ней есть пользователи','alert-danger'));
            }

        }
        else
        {
            return view("admin.user-groups");
        }
    }
}
