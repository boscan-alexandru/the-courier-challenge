<?php

class DeliveryChallenge {
   public $distance;
   public $weight;
   public $traffic;
   public $urgency;
   public $luck;

   public function __construct() {
      $this->distance = rand(5, 20);
      $this->weight = rand(10, 50);
      $this->traffic = rand(30, 60);
      $this->urgency = rand(1, 5);
      $this->luck = rand(20, 35);
   }
}