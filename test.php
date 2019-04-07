<?php
require 'vendor/autoload.php';

use Wagter\NefitEasyClient\Client\DummyDataClient;
use Wagter\NefitEasyClient\State;
use Wagter\NefitEasyClient\Normalizer;
use Wagter\NefitEasyClient\StateManager\StateManager;

$dummyDataFile = dirname( __FILE__ ) . '/dummy-data.json';
$dummyData     = json_decode( file_get_contents( $dummyDataFile ), true );

// state object manager to read from and write to the nefit-easy server
$stateManager = new StateManager(
    new DummyDataClient( $dummyData ), // the HttpClient object
    new Normalizer\MinMaxValueTemperatureStateNormalizer() // the Normalizer object
);

try {
    /** @var State\HeatingCircuits\Hc1\TemperatureRoomManual $tempRoomMan */
    $tempRoomMan = $stateManager->read( State\HeatingCircuits\Hc1\TemperatureRoomManual::class );
    
    echo sprintf( 'Minimum manual room temperature is <strong>%s &deg;%s</strong><br />',
        $tempRoomMan->getMinValue(),
        $tempRoomMan->getUnitOfMeasure()
    );
    
    echo sprintf( 'Maximum manual room temperature is <strong>%s &deg;%s</strong><br />',
        $tempRoomMan->getMaxValue(),
        $tempRoomMan->getUnitOfMeasure()
    );
    
    echo sprintf( 'Current manual room temperature is <strong>%s &deg;%s</strong><br />',
        $tempRoomMan->getValue(),
        $tempRoomMan->getUnitOfMeasure()
    );
    
    $newTemp = 18;
    if ( $tempRoomMan->getValue() !== $newTemp ) {
        $tempRoomMan->setValue( $newTemp );
        $stateManager->write( $tempRoomMan );
        echo sprintf( 'Manual room temperature is set to <strong>%s &deg;%s</strong><br />',
            $newTemp,
            $tempRoomMan->getUnitOfMeasure()
        );
        
        return;
    }
    
    echo sprintf( 'Manual room temperature is already set to <strong>%s &deg;%s</strong><br />',
        $newTemp,
        $tempRoomMan->getUnitOfMeasure()
    );
    
} catch ( \Exception $e ) {
    echo $e->getMessage();
}
