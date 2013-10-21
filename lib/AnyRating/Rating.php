<?php
namespace AnyRating;


class Rating {

    protected $id = 0;
    protected $targetId = 0;
    protected $type = '';
    protected $singleRatings = array();
    protected $value = null;
    protected $wilsonScoreLower = null;

    public function __construct($targetId = 0, $type = '', $id = 0) {
        $this->id = (int)$id;
    }

    public function getId() {
        return $this->id;
    }

    public function setSingleRatings(Array $ratings) {
        $this->singleRatings = $ratings;
    }

    public function addSingleRating(Rating\SingleRating $rating) {
        $this->singleRatings[] = $rating;
    }

    public function getValue() {
        if ($this->value === null) {
            if (!empty($this->singleRatings)) {
                $sum = 0;
                foreach ($this->singleRatings as $r) {
                    $sum += $r->getValue();
                }
                $this->value = $sum / count($this->singleRatings);
            }
        }
        return $this->value;
    }

    public function getWilsonScoreLower() {
        if ($this->wilsonScoreLower === null) {
            $count = array(1 => 0, 0, 0, 0, 0);
            foreach ($this->singleRatings as $r) {
                $count[ceil($r->getValue())] += 1;
            }

            $sum = 0 ;
            $n = 0 ;
            for( $i = 1 ; $i <= 5 ; ++$i ) {
                $w = ( $i - 1 ) / 4 ;
                $c = $count[ $i ] ;
                $sum += $c * $w ;
                $n += $c ;
            }

            if( $n > 0 ) {
                $ave = $sum / $n ;
                $z = 1.96 ;  // 95% percentile of normal distribution
                $k = $n - 1 ;  // (number of items) - 1
                $lower = ( $ave + $z * $z / ( 2 * $n ) - $z * sqrt( ( $k * $ave * ( 1 - $ave ) + $z * $z / ( 4 * $n ) ) / $n ) ) / ( 1 + $k * $z * $z / $n ) ;
                //$upper = ( $ave + $z * $z / ( 2 * $n ) + $z * sqrt( ( $k * $ave * ( 1 - $ave ) + $z * $z / ( 4 * $n ) ) / $n ) ) / ( 1 + $k * $z * $z / $n ) ;

                $this->wilsonScoreLower = 1 + 4 *$lower;
            }
        }

        return $this->wilsonScoreLower;
    }
}