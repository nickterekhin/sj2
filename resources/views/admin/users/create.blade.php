@extends('layouts.admin')
@section('page-title','Пользователь - создать')
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
                                    <label class="col-sm-3 control-label" for="HotelId">Группа</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="userGroup" name="userGroup" required>
                                            <option value="" class="disabled">Группа пользователя</option>
                                            @foreach($userGroups as $items)
                                                <option value="{!! $items->getId() !!}" @if(Input::old('userGroup')==$items->getId())selected="selected"@endif>{!! $items->getGroupName() !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="UserName">Пользователь</label>
                                    <div class="col-sm-9 input-field">
                                        <input type="text" name="UserName" id="UserName" class="form-control" required value="{!! Input::old('UserName') !!}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="FirstName">Имя</label>
                                    <div class="col-sm-9 input-field">
                                        <input type="text" name="FirstName" id="FirstName" class="form-control" required value="{!! Input::old('FirstName') !!}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="LastName">Фамилия</label>
                                    <div class="col-sm-9 input-field">
                                        <input type="text" name="LastName" id="LastName" class="form-control" required value="{!! Input::old('LastName') !!}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="Email">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="Email" id="Email" class="form-control" required value="{!! Input::old('Email') !!}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="Password">Пароль</label>
                                    <div class="col-sm-9 input-field">
                                        <input type="password" name="Password" id="Password" class="form-control" value="" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-2 text-left">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="Active" id="Active" value="1" @if(Input::old('Active')==1)checked="checked"@endif> Активный
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-9">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>Добавить</button>
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