<?php

namespace Tests\Unit;

use App\UserStats;
use PHPUnit\Framework\TestCase;

class UserStatsTest extends TestCase
{
    /**
     * Tests if the users get added up correctly.
     */
    public function test_user_count_is_accurate(): void
    {
        $users = ['dummy', 'dummy2', 'dummy3'];

        $userCount = (new UserStats($users))->getUserCount();

        $this->assertEquals(3, $userCount);
    }
}
