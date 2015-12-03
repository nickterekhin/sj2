@extends('layouts.master')
@section('content')
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
                @if(Dobby::isLoggedIn())
                     <a href="logout"><i class="fa fa-sign-out"></i> Logout</a>
                    @endif
            </div>
        </div>
    @stop
