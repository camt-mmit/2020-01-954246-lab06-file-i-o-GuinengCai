<?php
/*ID: 612110237
Name: Guineng Cai 
*/
    $fin = fopen($_SERVER['argv'][1], 'r');
    fscanf($fin, "%d", $n);
    for($i = 0; $i < $n; $i++) {
        fscanf($fin, "%f %f", $width, $height);
        printf("%6.2f X %6.2f = %6.2f\n", $width, $height, $width * $height);
    }

    fclose($fin);
