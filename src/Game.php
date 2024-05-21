<?php

class Game {
   public $courier;
   public $deliveries;
   public $maxDeliveries;

   public function __construct($maxDeliveries = 20, string $courier_name) {
      $this->courier = new Courier($courier_name);
      $this->deliveries = [];
      $this->maxDeliveries = $maxDeliveries;
   }

   public function play() {
      
      nice_print("📜 In the bustling city of Deliveria, a skilled delivery driver named Alex works tirelessly to ensure packages are delivered on time, no matter the obstacles. Alex, like all dedicated couriers, has unique strengths and weaknesses.", 0.05, 300, 2);
      $turns = 0;

      while ($turns < $this->maxDeliveries && $this->courier->stamina > 0) {
         $turns++;
         $delivery = new DeliveryChallenge();
         $this->deliveries[] = $delivery;

         // cal stats
         $stats = (object)[
            "distance" => $delivery->distance,
            "weight" => $delivery->weight,
            "traffic" => $delivery->traffic,
            "urgency" => $delivery->urgency,
            "luck" => $delivery->luck,
         ];

         nice_print("🚚 Delivery $turns:\n", 20, 1);
         nice_print("📏 Distance: {$stats->distance} km\n⚖️  Weight: {$stats->weight} kg\n🚦 Traffic: {$stats->traffic}%\n🚀 Urgency: {$stats->urgency}\n🍀 Luck: {$stats->luck}%\n", 10, 50, 0);

         $firstMove = $this->decideFirstMove($delivery);

         if ($firstMove === $this->courier->name) {
            $this->courier->useSkills($delivery);
            $this->handleImpact($delivery);
         } else {
            $this->handleImpact($delivery);
            $this->courier->useSkills($delivery);
         }

         
         if ($this->courier->stamina <= 0) {
            nice_print("🥱{$this->courier->name}'s stamina is depleted. Game Over.\n", 10, 50, 0);
            return;
         }
         nice_print("{$this->courier->name}'s stamina: {$this->courier->stamina}\n", 10, 50, 0);
         nice_print("\033[37m"."﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌\n", 10, 50, 0);
      }

      if ($turns >= $this->maxDeliveries) {
         nice_print("\033[32m" . "🎉 {$this->courier->name} successfully completed all deliveries. 🏆 Winner!\n \n", 10, 50, 0);
         nice_print("\033[37m" . "﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌﹌\n", 10, 50, 0);
      }
   }

   private function decideFirstMove($delivery) {
      if ($delivery->urgency > $this->courier->efficiency) {
         return 'Delivery';
      } elseif ($delivery->urgency < $this->courier->efficiency) {
         return $this->courier->name;
      } else {
         return $delivery->luck > $this->courier->luck ? 'Delivery' : $this->courier->name;
      }
   }

   private function handleImpact($delivery) {
      $impact = ($delivery->weight * $delivery->traffic) / $this->courier->strength;
      if (rand(0, 100) < $this->courier->luck && $this->courier->stamina > 0) {
         nice_print("{$this->courier->name} got lucky! No impact this turn.\n", 10, 50, 0);
      } else {
         $this->courier->stamina -= $impact;
         nice_print("Impact sustained: $impact\n", 10, 50, 0);
      }
   }
}