<?php
/**
 * Created by PhpStorm.
 * User: Dymok
 * Date: 10/20/13
 * Time: 1:13 PM
 */

namespace AnyRating\Rating;


class SingleRating {
    protected $parts = array();

    protected $value = null;

    public function addRatingPart(\AnyRating\Rating\RatingPart $ratingPart) {
        $this->parts[] = $ratingPart;
        $this->value = null;
    }

    public function getValue() {
        if ($this->value === null) {
            if (!empty($this->parts)) {
                $sum = 0;
                foreach ($this->parts as $p) {
                    $sum += $p->getValue();
                }
                $this->value = $sum / count($this->parts);
            }
        }
        return $this->value;
    }
} 