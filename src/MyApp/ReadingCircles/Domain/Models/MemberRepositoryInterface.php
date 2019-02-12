<?php

namespace MyApp\ReadingCircles\Domain\Models;

interface MemberRepositoryInterface
{
    public function persist(Member $member);
    public function queryByLoginId(MemberLoginId $loginId) : ?Member;
}
