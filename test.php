<?php
require 'vendor/autoload.php';

use Wagter\NefitEasyClient\Client\DummyDataClient;
use Wagter\NefitEasyClient\StateManager\StateManager;
use Wagter\NefitEasyClient\Normalizer\MinMaxValueTemperatureStateNormalizer;
use Wagter\NefitEasyClient\State\HeatingCircuits\Hc1\TemperatureRoomManual;

$dummyDataFile = dirname( __FILE__ ) . '/dummy-data.json';
$dummyData     = json_decode( file_get_contents( $dummyDataFile ), true );
$dummyClient   = new DummyDataClient( $dummyData );
$normalizer    = new MinMaxValueTemperatureStateNormalizer();
$stateManager  = new StateManager( $dummyClient, $normalizer );

try {
    /** @var TemperatureRoomManual $tempRoomMan */
    $tempRoomMan = $stateManager->read( TemperatureRoomManual::class );
    
    echo sprintf( '<p>Minimum manual room temperature is <strong>%s &deg;%s</strong></p>',
        $tempRoomMan->getMinValue(),
        $tempRoomMan->getUnitOfMeasure()
    );
    
    echo sprintf( '<p>Maximum manual room temperature is <strong>%s &deg;%s</strong></p>',
        $tempRoomMan->getMaxValue(),
        $tempRoomMan->getUnitOfMeasure()
    );
    
    echo sprintf( '<p>Current manual room temperature is <strong>%s &deg;%s</strong></p>',
        $tempRoomMan->getValue(),
        $tempRoomMan->getUnitOfMeasure()
    );
    
    $newTemp = 18;
    if ( $tempRoomMan->getValue() !== $newTemp ) {
        $tempRoomMan->setValue( $newTemp );
        $stateManager->write( $tempRoomMan );
        
        echo sprintf( '<p>Manual room temperature is set to <strong>%s &deg;%s</strong></p>',
            $newTemp,
            $tempRoomMan->getUnitOfMeasure()
        );
        
        return;
    }
    
    echo sprintf( '<p>Manual room temperature is already set to <strong>%s &deg;%s</strong></p>',
        $newTemp,
        $tempRoomMan->getUnitOfMeasure()
    );
    
} catch ( \Exception $e ) {
    echo $e->getMessage();
}