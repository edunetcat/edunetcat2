<?php
/**
 * @author Marcos Torrent
 * constants per saber la direccio de cada url depenent si estem en mode local dev o en produccio
 */
define ( 'YII_LOCAL', true );

if (YII_LOCAL) {
    define ( 'URLAPIEDUNET', 'http://dev.api.edunet.cat' );
    define ( 'URLEDUNET', 'http://dev.edunet.cat' );
} else {
    define ( 'URLAPIEDUNET', 'http://api.edunet.cat' );
    define ( 'URLEDUNET', 'http://www.edunet.cat' );
}
