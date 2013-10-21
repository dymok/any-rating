<?php
use AnyRating\Rating\SingleRating as SingleRating;
use AnyRating\Rating\RatingPart as RatingPart;

include('lib/AnyRating.php');

$anyRating = new AnyRating();
$anyRating->init();

$rating = new AnyRating\Rating();

$singleRating = new SingleRating();

$singleRating->addRatingPart(new RatingPart('deadline', 'Deadline', 4));
$singleRating->addRatingPart(new RatingPart('communication', 'Communication', 6));

$rating->addSingleRating($singleRating);

$singleRating = new SingleRating();

$singleRating->addRatingPart(new RatingPart('deadline', 'Deadline', 5));
$singleRating->addRatingPart(new RatingPart('communication', 'Communication', 5));

$rating->addSingleRating($singleRating);

echo $rating->getValue();
echo "\n\n";
echo $rating->getWilsonScoreLower();

echo "\nTests done\n\n";