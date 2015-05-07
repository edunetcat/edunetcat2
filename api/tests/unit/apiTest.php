<?php
use api\modules\v1\models\Centres;
require_once (__DIR__ . '/Funciones.php'); // funcio per llegir la api remotament
require_once (__DIR__ . '/_constants.php'); // per indicar la direccio de la api

/**
 *
 * @var \UnitTester
 * @author Marcos Torrent
 */
class apiTest extends \Codeception\TestCase\Test {
    protected $tester;
    protected $resultatCentre;
    
    /*
     * get_remote_data ens retorna un array de 2 posicions.
     * El primer element del array conté el codi json per tant agafem el resultat de la primera posició del array i
     * el descodifiquem amb json_decode, i això serà el resultat convertit en un objecte php
     */
    protected function _before() {
        $this->resultatCentre = json_decode ( Funciones::get_remote_data ( URLAPIEDUNET . '/v1/centres/1' )[0] );
    }
    protected function _after() {
    }
    
    // tests
    
    /**
     * En aquest test agafem la id del centre numero 1, per tant el resultat haurà de ser igualment 1
     */
    public function testCentre1() {
        
        // amb aquest mètode comprovem que la peticio a la api i el funcionament de la api buscant centres és correcte
        $this->assertEquals ( $this->resultatCentre->id, 1 );
    }
    /**
     * En aquest test mirem si la resposta dels missatge numero 0 (que no existeix, es un array amb el missatge 404
     */
    public function testMissatge0() {
        $resultat = json_decode ( Funciones::get_remote_data ( URLAPIEDUNET . '/v1/missatges/0' )[0] );
        
        $this->assertEquals ( $resultat->status, 404 );
    }
    
    /**
     * En aquest test mirem si la resposta es un array amb més de un curs
     */
    public function testCursos() {
        $resultat = json_decode ( Funciones::get_remote_data ( URLAPIEDUNET . '/v1/cursos' )[0] );
        
        $this->assertTrue ( sizeof ( $resultat ) > 1 );
    }
    
    /**
     * En aquest test mirem si el segon curs es Historia
     */
    public function testAssignatura() {
        $resultat = json_decode ( Funciones::get_remote_data ( URLAPIEDUNET . '/v1/assignatures/2' )[0] );
        
        $this->assertEquals ( $resultat->nomAssignatura, "Historia" );
    }
    
    /**
     * En aquest test mirem si agafa be la primera persona
     */
    public function testPersona() {
        $resultat = json_decode ( Funciones::get_remote_data ( URLAPIEDUNET . '/v1/persona/1' )[0] );
        
        $this->assertEquals ( $resultat->id, 1 );
    }
}

