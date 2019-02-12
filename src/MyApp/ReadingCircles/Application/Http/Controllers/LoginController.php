<?php

namespace MyApp\ReadingCircles\Application\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MyApp\ReadingCircles\Application\UseCases\RCMemberLogin;
use MyApp\ReadingCircles\Application\Http\Requests\LoginAuthRequest;

class LoginController
{
    /**
     * @var RCMemberLogin
     */
    protected $memberLogin;

    public function __construct(RCMemberLogin $memberLogin)
    {
        $this->memberLogin = $memberLogin;
    }

    /**
     * ログインフォームを表示
     */
    public function login()
    {
        return view('reading-circles.login.login');
    }

    /**
     * ログイン処理
     */
    public function auth(LoginAuthRequest $request)
    {
        // 最低限のValidateはRequestで実行済

        // ログイン処理
        $loginId = $request->get('loginId');
        $result = $this->memberLogin->loginByFormInput($loginId);
        if ($result) {
            return redirect('reading-circles/');
        } else {
            return 'ログイン失敗';
        }
    }
}
