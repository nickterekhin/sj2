@extends('layouts.admin')
@section('page-title','Группа пользователей - создать')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="flat-block-info">
                <div class="content">
                    <div class="row">
                        <form class="form-horizontal" method="POST" action="">
                            <div class="col-md-6">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="groupName">Имя группы</label>
                                    <div class="col-sm-9 input-field">
                                        <input type="text" name="groupName" id="groupName" class="form-control" required value="{!! $group->getGroupName() !!}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="Permissions">Права доступа</label>
                                    <div class="col-sm-9 input-field">

                                        <div class="row row-top-margin" id="permission-list">
                                            <div class="col-sm-12">
                                                @foreach($permsList as $index=>$perm)
                                                    <div class="col-sm-4 ">
                                                        <div class="checkbox">
                                                            <input type="checkbox" value="{!! $perm->getPermission() !!}" name="perms[{!! $perm->getId() !!}]" id="perms_{!! $perm->getId() !!}" title="{!! $perm->getDescription() !!}" @if($group->isInPermission($group->getPermissions(),$perm->getPermission()))checked="checked"@endif> {!! $perm->getPermission() !!}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i>Редактировать</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>
@stop