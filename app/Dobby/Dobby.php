<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 06.09.2015
 * Time: 22:36
 */

namespace App\Dobby;
use App\Dobby\ModelProviders\IUsers;
use Illuminate\Cookie\CookieJar;

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
                $this->request->session()->put('user',$this->userProvider->getUserByCredential($passwd,$uid,true));
                $this->request->session()->put('isLogged',1);
                return true;
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
}