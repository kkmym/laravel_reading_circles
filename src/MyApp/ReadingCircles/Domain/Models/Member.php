<?php

namespace MyApp\ReadingCircles\Domain\Models;

class Member
{
    protected $memberId;
    protected $loginId;
    protected $name;
    protected $displayName;

    public function __construct(MemberId $memberId, MemberLoginId $loginId, string $name, string $displayName)
    {
        $this->memberId = $memberId;
        $this->loginId = $loginId;
        $this->name = $name;
        $this->displayName = $displayName;
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->memberId->value();
    }

    /**
     * @return MemberId
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * @return string
     */
    public function loginId()
    {
        return $this->loginId->value();
    }

    /**
     * @return MemberLoginId
     */
    public function getMemberLoginId()
    {
        return $this->loginId;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function displayName()
    {
        return $this->displayName;
    }
}
