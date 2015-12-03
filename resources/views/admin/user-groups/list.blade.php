@extends('layouts.admin')
@section('page-title','Группы пользователей')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="flat-block-info">
                <div class="content ">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th style="width:30px">#</th>
                            <th>Группа</th>
                            <th>Права</th>
                            <th class="action-buttons">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userGroups as $ug)
                            <tr>
                                <td>
                                    {!! $ug->getId() !!}
                                </td>
                                <td>
                                    {!! $ug->getGroupName() !!}
                                </td>
                                <td>
                                    {!! $ug->getPermissions() !!}
                                </td>

                                <td>

                                    @if(session('user')->getId()==1 && $ug->getId()!=1)
                                        <a href="/admin/user-groups/edit/{!! $ug->getId() !!}" class="btn btn-info"><i class="fa fa-pencil-square-o"></i>Edit</a>
                                            @if($ug->getId()!=1)

                                            <a href="/admin/user-groups/delete/{!! $ug->getId() !!}" class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a>
                                            @endif
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