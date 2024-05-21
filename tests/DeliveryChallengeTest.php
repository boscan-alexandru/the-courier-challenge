<?php

use PHPUnit\Framework\TestCase;

class DeliveryChallengeTest extends TestCase {
    public function testDeliveryChallengeInitialization() {
        $delivery = new DeliveryChallenge();
        $this->assertGreaterThanOrEqual(5, $delivery->distance);
        $this->assertLessThanOrEqual(20, $delivery->distance);

        $this->assertGreaterThanOrEqual(10, $delivery->weight);
        $this->assertLessThanOrEqual(50, $delivery->weight);

        $this->assertGreaterThanOrEqual(30, $delivery->traffic);
        $this->assertLessThanOrEqual(60, $delivery->traffic);

        $this->assertGreaterThanOrEqual(1, $delivery->urgency);
        $this->assertLessThanOrEqual(5, $delivery->urgency);
        
        $this->assertGreaterThanOrEqual(20, $delivery->luck);
        $this->assertLessThanOrEqual(35, $delivery->luck);
    }
}