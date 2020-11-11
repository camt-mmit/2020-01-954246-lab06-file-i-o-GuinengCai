<?php
/*ID: 612110237
Name: Guineng Cai 
*/
    $fp = fopen($_SERVER['argv'][1], "r");
    
    fscanf($fp, "%d", $n);
    printf("number of data %2d\n", $n);
    
    $total = 0;
    for($i = 0; $i < $n; $i++) {
        fscanf($fp, "%s %f", $name, $score);
        printf("%-10s : %10f\n", $name, $score);
        $total += $score;
    }
    
    fclose($fp);
    
    printf("Average score = %10f\n", $total / $n);
