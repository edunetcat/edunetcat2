<?php
/**
 *
 * @author Marcos Torrent
 *
 */
class Funciones {
    
    /**
     * Funció per agafar una part de la capçaleres
     *
     * @param array $h
     *            la capçalera
     * @param string $clave
     *            el nom de la part de la capçalera que volem
     * @return string|unknown el valor de la clau
     */
    public static function getHeader($h, $clave) {
        if (! is_array ( $h ))
            $h = explode ( "\r", $h );
        if (! is_array ( $h ))
            $h = explode ( "\n", $h );
        
        foreach ( $h as $linea ) {
            $array = explode ( ':', $linea );
            if ($clave == trim ( $array [0] ))
                return trim ( $array [1] );
        }
        
        return $h;
    }
    
    /**
     * Consulta i retorna el resultat d'una api
     *
     * @param string $url
     *            url de la api
     * @return multitype:string array de 2 posicions: la primera amb el resultat de la consulta i la segona amb la capçalera
     */
    public static function get_remote_data($url) {
        $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
        
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_USERAGENT, $agent );
        curl_setopt ( $ch, CURLOPT_VERBOSE, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 1 );
        
        $result = curl_exec ( $ch );
        
        $header_size = curl_getinfo ( $ch, CURLINFO_HEADER_SIZE );
        $header = substr ( $result, 0, $header_size );
        $body = substr ( $result, $header_size );
        
        curl_close ( $ch );
        return [ 
                $body,
                $header 
        ];
    }
    public static function suma($un, $dos) {
        return $un + $dos;
    }
}