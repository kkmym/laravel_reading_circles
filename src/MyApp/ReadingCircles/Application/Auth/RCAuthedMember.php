<?php

namespace MyApp\ReadingCircles\Application\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use MyApp\ReadingCircles\Domain\Models\Member;

class RCAuthedMember implements Authenticatable
{
    protected $memberId;
    protected $member = null;

    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'member_id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        if (!$this->member) {
            return null;
        }
        return $this->member->id();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return '';
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return '';
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {

    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return '';
    }
}
