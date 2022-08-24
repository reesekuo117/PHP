<?php
    //php的邏輯運算會得到布林值true/false
    $a = 12;
    $b = 3;

    var_dump( $a && $b );  //bool(true)
    echo '<br>';
    var_dump( $a || $b );  //bool(true)
    echo '<br>';

    var_dump( $a=6 && $b=7 );  
    echo '<br>';
    echo "$a, $b <br>";    //bool(true), 1, 3


    $a = 12;
    $b = 3;
    var_dump( $a=6 and $b=7 );
    echo '<br>';
    echo "$a, $b <br>";    //bool(true), 6, 7

    //and or的優先權比 ＝要低

    $a = 12;
    $b = 3;
    var_dump( $a=0 and $b=7 );
    echo '<br>';
    echo "$a, $b <br>";    //bool(false), 6, 7




?>
