<?php
use api\modules\v1\models\Centres;
require_once (__DIR__ . '/Funciones.php'); // funcio per llegir la api remotament
require_once (__DIR__ . '/_constants.php'); // per indicar la direccio de la api
class centresTest extends \Codeception\TestCase\Test {
    /**
     *
     * @var \UnitTester
     * @author Marcos Torrent
     */
    protected $tester;
    protected function _before() {
    }
    protected function _after() {
    }
    
    // tests
    public function testCentre1() {
        
        // get_remote_data ens retorna un array de 2 posicions. El primer element del array cont� el codi json
        // per tant agafem el resultat de la primera posici� del array i el descodifiquem amb json_decode,
        // i aix� ser� el resultat convertit en un objecte php
        $resultat = json_decode ( Funciones::get_remote_data ( URLAPIEDUNET . '/v1/centres/1' )[0] );
        
        // En aquest test agafem la id del centre numero 1, per tant el resultat haur� de ser igualment 1
        // amb aquest m�tode comprovem que la peticio a la api i el funcionament de la api buscant centres �s correcte
        $this->assertEquals ( $resultat->id, 1 );
    }
}

