<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 06.09.2015
 * Time: 22:36
 */

namespace App\Dobby;
use App\Dobby\ModelProviders\IUsers;
use App\Models\Users;
use Illuminate\Cookie\CookieJar;
use Illuminate\Http\Request;

class Dobby
{
    protected $user;
    protected $userProvider;
    protected $session;
    protected $request;
    protected $cookie;

    /**
     * @param IUsers $userProvider
     * @param Request $request
     * @param CookieJar $cookie
     */
    public function __construct(IUsers $userProvider, $request, CookieJar $cookie)
    {
        $this->userProvider = $userProvider;
        $this->request = $request;
        $this->cookie = $cookie;
    }

    /**
     * @return bool
     */
    public function initUser()
    {

        $this->user = $this->request->session()->get('user');
        \Debugbar::info($this->request->session());
        if($this->user==null)
        {
            \Debugbar::info($this->user);
            $uid = $this->request->cookie('uid');
            $passwd = $this->request->cookie('pwd');

            \Debugbar::info($uid." - ".$passwd);
            if($uid!=null && $passwd!=null)
            {
                /** @var Users $user */
                $user = $this->userProvider->getUserByCredential($passwd,$uid,true);

                if($user!=null)
                {
                    $this->request->session()->put('user',$user);
                    $this->request->session()->put('isLogged', 1);
                    $this->request->session()->put('permissions', $this->userProvider->getPermissions($user->getGroup->Permissions));

                    return true;
                }
                else
                {
                    $this->request->session()->put('isLogged',0);
                    return false;
                }
            }
            else
            {
                $this->request->session()->put('isLogged',0);
                return false;
            }

        }
    }
    public function login(array $credential, $remember = false)
    {

        $this->user = $this->userProvider->getUserByCredential($credential['password'],$credential['login'],null);
        \Debugbar::info($this->user);

        if($this->user!=null)
        {
            \Debugbar::addMessage($this->user->getLogin());
            $this->cookie->queue($this->cookie->make('uid',$this->user->getLogin(),30,'/'));
            $this->cookie->queue($this->cookie->make('pwd',$this->user->getPassword(),30,'/'));
            \Debugbar::info($this->cookie->getQueuedCookies());
            return true;
        }
        else
        {
            return false;
        }

    }
    public function logout()
    {
        $this->request->session()->forget('user');
        $this->request->session()->put('isLogged',0);
        $this->cookie->queue($this->cookie->forget('uid'));
        $this->cookie->queue($this->cookie->forget('pwd'));
    }

    /**
     *
     */
    public function isLoggedIn()
    {

        if($this->request->session()->get('isLogged')==1)
        {
            \Debugbar::addMessage("logged");
            return true;
        }
        else
        {
            \Debugbar::addMessage("not logged");
            return false;
        }
    }

    /**
     * @param $permsString
     * @return bool
     */
    public function checkRights($permsString)
    {
        if(in_array($permsString,$this->request->session()->get("permissions")))
            return true;

        if(in_array('all',$this->request->session()->get("permissions")))
            return true;

        return false;
    }

    public function checkUserState()
    {
        if ($this->request->session()->get("user")!=null && $this->request->session()->get("user")->getId()!=1) {
            if (!$this->userProvider->getUserState($this->request->session()->get("user")->getId())) {
                $this->logout();
            }
        }
    }

}