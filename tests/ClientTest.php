<?php

use PHPUnit\Framework\TestCase;
use Sildabia\Client;

class ClientTest extends TestCase
{
    /** @test */
    public function itWorks()
    {
        $this->assertFalse((new Client)->send('1', 'foo', 'new_contract', ['email' => 'foo@bar.com'], $tags = null));
    }
}
