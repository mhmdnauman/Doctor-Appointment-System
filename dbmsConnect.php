<?php

    /*
        -----------------------------------------
        Created by Muhammad Nauman
        FUI/FURC/F19-BSCS-024
        Foundation University Rawalpindi Campus.
        Date: 05,June 2022
        -----------------------------------------
     */

    try{

        $DB_Connection = new PDO
        (  
           'mysql:host=localhost;
            port=3306;
            dbname=personsDatabase',
            'admin',
            'admin'
        );
        
        // Set the PDO error mode to exception
        
        $DB_Connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  // See the "errors" folder for details...
    } 
    
    catch( PDOException $exception ){

        die(  "ERROR: Could not connect. " . $exception->getMessage()  );
        // echo(  "ERROR: Database Connection Failed. " . $exception->getMessage()  );
    }

?>
