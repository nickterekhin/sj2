@extends('layouts.admin')
@section('page-title','Пользователи')
@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="flat-block-info">
                <div class="content ">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Группа</th>
                            <th>Пользователь</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Дата</th>
                            <th>Статус</th>
                            <th class="action-buttons">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    {!! $user->getId() !!}
                                </td>
                                <td>
                                    {!! $user->getGroupName() !!}
                                </td>
                                <td>
                                    {!! $user->getUserName() !!}
                                </td>
                                <td>
                                    {!! $user->getFullName() !!}
                                </td>
                                <td>
                                    {!! $user->getEmail() !!}
                                </td>
                                <td>
                                    {!! $user->getRegDate() !!}
                                </td>
                                <td>
                                    @if($user->isActive())
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-danger">inActive</span>
                                    @endif
                                </td>
                                <td>

                                    @if(session('user')->getId()==1 || $user->getId()!=1)
                                    <a href="/admin/users/edit/{!! $user->getId() !!}" class="btn btn-info"><i class="fa fa-pencil-square-o"></i>Edit</a>
                                        @if(session('user')->getId()!=$user->getId())
                                            @if($user->isActive())
                                            <a href="/admin/users/close/{!! $user->getId() !!}" class="btn btn-warning btn-openclose"><i class="fa fa-lock"></i>Deactivate</a>
                                            @else
                                            <a href="/admin/users/open/{!! $user->getId() !!}" class="btn btn-success btn-openclose"><i class="fa fa-unlock"></i>Activate</a>
                                            @endif
                                    <a href="/admin/users/delete/{!! $user->getId() !!}" class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a>
                                        @endIf
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
