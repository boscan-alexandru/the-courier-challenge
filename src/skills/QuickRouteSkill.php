<?php

class QuickRouteSkill implements Skill {
   public function use(Courier $courier, DeliveryChallenge $delivery): void {
      if (rand(0, 100) < 15) {
         echo "⚡ Skill used: Quick Route\n";
         // Implement the effect of Quick Route skill
      }
   }
}