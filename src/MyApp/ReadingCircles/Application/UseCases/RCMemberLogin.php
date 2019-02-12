<?php

namespace MyApp\ReadingCircles\Application\UseCases;

use MyApp\ReadingCircles\Domain\Models\MemberRepositoryInterface;
use MyApp\ReadingCircles\Domain\Models\MemberLoginId;
use MyApp\ReadingCircles\Application\Auth\RCAuthedMember;
use Auth;

class RCMemberLogin
{
    /**
     * @var MemberRepositoryInterface
     */
    protected $memberRepo;

    public function __construct(MemberRepositoryInterface $memberRepo)
    {
        $this->memberRepo = $memberRepo;
    }

    public function loginByFormInput(string $loginId)
    {
        // DBへの照合
        $member = $this->memberRepo->queryByLoginId(new MemberLoginId($loginId));
        if (!$member) {
            return false;
        }

        // セッションにデータをセット
        session(['loginId' => $loginId, $loginId => serialize($member)]);
        // cookieにもデータをセット
        \Cookie::queue('loginId', $loginId, 1440);

        // Guardにユーザー情報をセット
        Auth::guard('rcmember')->setUser(new RCAuthedMember($member));

        return true;
    }

    public function loginBySessionInfo()
    {
        // セッション上のログインIDを取得
        $loginId = session('loginId');
        // Cookie上のログインIDを取得
        $loginIdInCookie = \Cookie::get('loginId');

        // 合致しなければ、ログイン失敗させる
        if (empty($loginId) || $loginId != $loginIdInCookie) {
            return false;
        }

        // CookieのExpire更新
        \Cookie::queue('loginId', $loginId, 1440);

        // セッション上の情報を復元
        $serialized = session($loginId);
        $member = unserialize($serialized);

        // Guardに情報をセット
        Auth::guard('rcmember')->setUser(new RCAuthedMember($member));
    
        return true;
    }

    public function loginByCookieInfo()
    {
        // Cookie上のログインIDを取得
        $loginIdInCookie = \Cookie::get('loginId');
        if ($loginIdInCookie == null) {
            return false;
        }

        // DBからユーザー情報を取得
        $member = $this->memberRepo->queryByLoginId(new MemberLoginId($loginIdInCookie));
        if (!$member) {
            return false;
        }

        // セッションにデータをセット
        session(['loginId' => $loginIdInCookie, $loginIdInCookie => serialize($member)]);

        // Guardに情報をセット
        Auth::guard('rcmember')->setUser(new RCAuthedMember($member));

        return true;
    }
}
