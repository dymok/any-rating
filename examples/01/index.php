<?php
/**
 * Simple rating example
 */

include('lib/AnyRating.php');

$anyRating = new AnyRating();
$anyRating->init();

$rating = new AnyRating\Rating();
$rating->addSingleRating(1);
$rating->addSingleRating(2);
$rating->addSingleRating(3);

echo $rating->getValue();
echo "\n\n";
echo $rating->getWilsonScoreLower();

echo "\nTests done\n\n";