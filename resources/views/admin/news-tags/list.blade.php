@extends('layouts.admin')

@section('page-title','Tags')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="flat-block-info">
                <div class="content ">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tag Name</th>
                            <th>Active</th>
                            <th class="action-buttons">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>
                                    {!! $tag->getId() !!}
                                </td>
                                <td>
                                    {!! $tag->getTagName() !!}
                                </td>
                                <td>
                                    @if($promo->getActive())
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-danger">inActive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/admin/promo/edit/{!! $promo->getId() !!}" class="btn btn-info"><i class="fa fa-pencil-square-o"></i>Edit</a>
                                    @if($promo->getActive())
                                        <a href="/admin/promo/close/{!! $promo->getId() !!}" class="btn btn-warning btn-openclose"><i class="fa fa-lock"></i>Deactivate</a>
                                    @else
                                        <a href="/admin/promo/open/{!! $promo->getId() !!}" class="btn btn-success btn-openclose"><i class="fa fa-unlock"></i>Activate</a>
                                    @endif
                                    <a href="/admin/promo/delete/{!! $promo->getId() !!}" class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a>
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