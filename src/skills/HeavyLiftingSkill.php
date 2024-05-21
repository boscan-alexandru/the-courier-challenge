<?php

class HeavyLiftingSkill implements Skill {
   public function use(Courier $courier, DeliveryChallenge $delivery): void {
       if (rand(0, 100) < 25 && $delivery->weight > 20) {
           echo "⚡ Skill used: Heavy Lifting\n";
           $delivery->weight *= 0.75; // Reduce the weight impact
       }
   }
}