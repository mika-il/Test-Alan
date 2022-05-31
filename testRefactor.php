<?php

Class Vehicle 
{
    private $vehicleTypes;
    private $vehicleSpeed;
    private const DESTINATION_DISTANCE = 350;
    private const BOAT_EXTRA = 0.25;

    public function __construct(array $vehicleTypes, array $vehicleSpeed) 
    {
        $this->vehicleTypes = $vehicleTypes;
        $this->vehicleSpeed = $vehicleSpeed;
    }

    public function getDuration($speed)
    {
        return self::DESTINATION_DISTANCE / $speed;
    }

    public function displayDuration()
    {
        for ($i=0; $i< count($this->vehicleTypes); $i++) {
            $durationByVehicle = $this->vehicleTypes[$i] === 'boat' ? $this->getDuration($this->vehicleSpeed[$i]) + self::BOAT_EXTRA : $this->getDuration($this->vehicleSpeed[$i]);
            print("{$this->vehicleTypes[$i]} : {$durationByVehicle} \n");
        }
    } 
}

$vehicleTypes = ['sport-car', 'truck', 'bike', 'boat'];
$vehicleSpeed = [150, 60, 100, 50];
$vehicle = new Vehicle($vehicleTypes, $vehicleSpeed);

print("Duration of each vehicle to reach destination\n");
$vehicle->displayDuration();
