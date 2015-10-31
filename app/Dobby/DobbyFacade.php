<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 07.09.2015
 * Time: 22:41
 */

namespace App\Dobby;


use Illuminate\Support\Facades\Facade;

class DobbyFacade extends Facade
{
    protected static function getFacadeAccessor(){return 'dobby';}
}