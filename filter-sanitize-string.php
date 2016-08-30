<?php 
/*
 * Sanitize a single string or array of string 
 *
 * sample usage:
 * $inp = fss( $_POST['inp'] );
 * $_POST = fss( $_POST );
 *
 * @param str|array $str
 * @return str|array (it depends on the input)
*/
function fss( $str ){

    if ( is_array( $str ) ) {
        $ret_arr = array();

        foreach ($str as $k => $v) {
            $ret_arr[$k] = filter_var( $v, FILTER_SANITIZE_STRING );

            if ( is_array($v) ) {
                $ret_arr[$k] = fss( $v );
            }
        }

        return $ret_arr;
            
    }else{
        $str = trim($str);
        return filter_var( $str, FILTER_SANITIZE_STRING );
    }
}
