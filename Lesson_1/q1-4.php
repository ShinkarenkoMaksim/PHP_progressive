<?php
class Auto {
    protected $body;
    protected $power;
    protected $speed;
    protected $transmission;

    protected $capacity;
    protected $pathLength;
    protected $width;
    protected $height;
    protected $length;
    protected $engStarted;
    protected $mileage;


    public function drive() {

        $this->accelerate();
        $this->lightsOn();
    }
    public function lightsOn() {}
    public function brake() {}
    public function accelerate() {}

    function __construct($body, $power, $speed, $transmission, $capacity, $pathLength, $width, $height, $length, $mileage)
    {
        $this->body = $body;
        $this->power = $power;
        $this->speed = $speed;
        $this->transmission = $transmission;
        $this->capacity = $capacity;
        $this->pathLength = $pathLength;
        $this->width = $width;
        $this->height = $height;
        $this->length = $length;
        $this->mileage = $mileage;
    }
}

class AutoGasolineDiesel extends Auto {
    protected $engStarted;
    protected $fuel;
    public function engStart() {

        $this->engStarted = true;
    }
    public function engStop() {

        $this->engStarted = false;
    }
    function drive()
    {
        if (!$this->engStarted) {
            $this->engStart();
        }
        parent::drive();
    }

    function __construct($body, $power, $speed, $transmission,  $capacity, $pathLength, $width, $height, $length, $mileage, $fuel)
    {
        parent::__construct($body, $power, $speed, $transmission, $capacity, $pathLength, $width, $height, $length, $mileage);
        $this->fuel = $fuel;
    }
}

$auto1 = new Auto('sedan', 600, 320, 'auto', 5, 300, 250, 150, 450, 123);
$auto1->drive();

$auto2 = new AutoGasolineDiesel('cabriolet', 1200, 500, 'auto', 2, 500, 300, 200, 500, 894, 'diesel');
$auto2->engStart();
$auto2->drive();