<?php

namespace App;

use App\Models\User;

class UserStats
{

    private int $users;

    /**
     * Constructor. Set up the conversion.
     *
     * @param int $amount
     * @param int $currencyFrom
     * @param int $currencyTo
     */
    public function __construct($usersList)
    {
        $this->users = 0;
        foreach ($usersList as $user)
        {
            $this->users += 1;
        }
    }

    /**
     * Return the conversion value.
     *
     * @return int
     */
    public function getUserCount(): int
    {
        return $this->users;
    }
}
