<?php

namespace MyApp\ReadingCircles\Domain\Repositories;

use MyApp\ReadingCircles\Domain\Models\Member;
use MyApp\ReadingCircles\Domain\Models\MemberLoginId;

interface MemberRepositoryInterface
{
    public function persist(Member $member);
    public function findByLoginId(MemberLoginId $loginId) : ?Member;
}
