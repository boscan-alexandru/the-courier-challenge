<?php

use PHPUnit\Framework\TestCase;

class CourierTest extends TestCase {
   public function testCourierInitialization() {
        $courier = new Courier();
        $this->assertGreaterThanOrEqual(80, $courier->stamina);
        $this->assertLessThanOrEqual(120, $courier->stamina);
        $this->assertGreaterThanOrEqual(60, $courier->speed);
        $this->assertLessThanOrEqual(90, $courier->speed);
        $this->assertGreaterThanOrEqual(50, $courier->strength);
        $this->assertLessThanOrEqual(70, $courier->strength);
        $this->assertGreaterThanOrEqual(50, $courier->efficiency);
        $this->assertLessThanOrEqual(70, $courier->efficiency);
        $this->assertGreaterThanOrEqual(15, $courier->luck);
        $this->assertLessThanOrEqual(35, $courier->luck);
   }

   public function testAddSkill() {
      $courier = new Courier();
      $quickRouteSkill = new QuickRouteSkill();
      $heavyLiftingSkill = new HeavyLiftingSkill();

      $courier->addSkill($quickRouteSkill);
      $courier->addSkill($heavyLiftingSkill);

      $this->assertCount(2, $this->getSkills($courier));
   }
   public function testHasSkill() {
      $courier = new Courier();
      $quickRouteSkill = new QuickRouteSkill();
      $heavyLiftingSkill = new HeavyLiftingSkill();

      $courier->addSkill($quickRouteSkill);

      $this->assertTrue($courier->hasSkill(QuickRouteSkill::class));
      $this->assertFalse($courier->hasSkill(HeavyLiftingSkill::class));

      $courier->addSkill($heavyLiftingSkill);
      $this->assertTrue($courier->hasSkill(HeavyLiftingSkill::class));
   }

   private function getSkills(Courier $courier) {
      $reflection = new ReflectionClass($courier);
      $property = $reflection->getProperty('skills');
      $property->setAccessible(true);
      return $property->getValue($courier);
   }
}