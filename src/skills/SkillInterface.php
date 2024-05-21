<?php

interface Skill {
   public function use(Courier $courier, DeliveryChallenge $delivery): void;
}