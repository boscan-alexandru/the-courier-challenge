<?php

class Courier {
   public $name;
   public $stamina;
   public $speed;
   public $strength;
   public $efficiency;
   public $luck;
   public $skills;

   public function __construct(string $name = 'Alex') {
      $this->name = $name;
      $this->stamina = rand(80, 120);
      $this->speed = rand(60, 90);
      $this->strength = rand(50, 70);
      $this->efficiency = rand(50, 70);
      $this->luck = rand(15, 35);
      $this->skills = [];
   }

   public function hasSkill(string $skillClass): bool {
      foreach ($this->skills as $skill) {
         if (get_class($skill) === $skillClass) {
            return true;
         }
      }
      return false;
   }

   public function addSkill(Skill $skill) {
      $this->skills[] = $skill;
   }

   public function useSkills(DeliveryChallenge $delivery) {
      foreach ($this->skills as $skill) {
          $skill->use($this, $delivery);
      }
   }
}