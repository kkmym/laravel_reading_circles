<?php

namespace MyApp\ReadingCircles\Infrastructure\Repositories;

use MyApp\ReadingCircles\Domain\Models\MemberRepositoryInterface;
use MyApp\ReadingCircles\Domain\Models\Member;
use MyApp\ReadingCircles\Domain\Models\MemberLoginId;
use MyApp\ReadingCircles\Domain\Models\MemberId;
use MyApp\ReadingCircles\Infrastructure\DAOs\MemberDAO;

class MemberRepository implements MemberRepositoryInterface
{
    /**
     * @var MemberDAO
     */
    protected $memberDao;

    public function __construct(MemberDAO $memberDao)
    {
        $this->memberDao = $memberDao;
    }

    public function persist(Member $member)
    {

    }

    public function findByLoginId(MemberLoginId $loginId) : ?Member
    {
        $valOfLoginId = $loginId->value();
        $member = $this->memberDao->findByLoginId($valOfLoginId);
        if (!$member) {
            return null;
        }
        return new Member(new MemberId($member->member_id), $loginId, $member->name, $member->display_name);
    }
}
