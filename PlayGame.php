<?php
require 'vendor/autoload.php';

$game = new Game(20, 'Alex');
$game->courier->addSkill(new QuickRouteSkill());
$game->courier->addSkill(new HeavyLiftingSkill());
$game->courier->addSkill(new SpeedBoostSkill());
$game->play();