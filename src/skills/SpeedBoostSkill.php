<?php

class SpeedBoostSkill implements Skill {
   public function use(Courier $courier, DeliveryChallenge $delivery): void {
       if (rand(0, 100) < 10) { // 10% chance to use
           echo "⚡ Skill used: Speed Boost\n";
           $courier->speed += 10; // Increase speed for this delivery
       }
   }
}