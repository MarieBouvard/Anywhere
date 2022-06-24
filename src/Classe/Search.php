<?php 

namespace App\Classe;

use App\Entity\Style;
use App\Entity\Activity;
use App\Entity\NumberOfPeople;



class Search {
    /**
     * @var string
     */
    public $string = '';

    /**
     * @var Style[]
     */
    public $styles = [];

    /**
     * @var Activity[]
     */
    public $activities = [];

    /**
     * @var NumberOfPeople[]
     */
    public $numberOfPeople = [];
}