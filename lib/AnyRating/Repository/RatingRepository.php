<?php
namespace AnyRating\Repository;
use AnyRating\Rating as Rating;


class RatingRepository {

    protected $_ratings = array();

    public function add(Rating $rating) {
        $this->_ratings[] = $rating;
    }

    public function persist() {
        echo "\n\nNot implemented yet\n\n";
    }
}