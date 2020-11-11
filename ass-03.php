<?php
/*ID: 612110237
Name: Guineng Cai 
*/
    $fin = STDIN;
    $fout = null;
    $outputFilename = null;
    $errorMessage = null;
    if($_SERVER['argc'] == 3) {
        if(($fin = @fopen($_SERVER['argv'][1], "r")) === false) {
            $errorMessage = "Cannot open file {$_SERVER['argv'][1]}!!!";
        } else {
            $outputFilename = $_SERVER['argv'][2];
        }
    } else if($_SERVER['argc'] == 2) {
        $outputFilename = $_SERVER['argv'][1];
    } else {
        $errorMessage = <<<EOT
invalid arguments
use {$_SERVER['argv'][0]} [input_file] output_file
EOT;
    }
    
    if($outputFilename !== null) {
        // use @ sign to prevent printing warning message.
        if(($fout = @fopen($outputFilename, "w")) === false) {
            $errorMessage = "Cannot create file {$outputFilename}!!!";
        }
    }
    
    if($errorMessage === null) {
        while(!feof($fin)) {
            $buff = fread($fin, 4096); // minimal block size
            fwrite($fout, $buff);
        }
    } else {
        fprintf(STDERR, "%s\n", $errorMessage);
    }
    
    if($fin && ($fin !== STDIN)) fclose($fin);
    if($fout) fclose($fout);
