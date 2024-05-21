<?php

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase {
    public function testGameInitialization() {
        $game = new Game(20, 'Alex');
        $this->assertInstanceOf(Courier::class, $game->courier);
        $this->assertIsArray($game->deliveries);
        $this->assertCount(0, $game->deliveries);
        $this->assertEquals(20, $game->maxDeliveries);
    }

    public function testDecideFirstMove() {
        $game = new Game(20, 'Alex');
        $delivery = new DeliveryChallenge();
        $move = $this->invokeMethod($game, 'decideFirstMove', [$delivery]);
        $this->assertContains($move, ['Alex', 'Delivery']);
    }

    protected function invokeMethod(&$object, $methodName, array $parameters = []) {
        $reflection = new ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $parameters);
    }
}