<?php
/**
 * Created by PhpStorm.
 * User: Dymok
 * Date: 10/20/13
 * Time: 1:44 PM
 */

namespace AnyRating\Rating;


class RatingPart {
    protected $name = '';
    protected $label = '';
    protected $value = 0;

    public function __construct($name = '', $label = '', $value = 0) {
        $this->setName($name);
        $this->setLabel($label);
        $this->setValue($value);
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }
} 