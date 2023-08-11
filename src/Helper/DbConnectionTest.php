<?php

use Cake\Datasource\ConnectionManager;
function Testconnection()
{
    try {
        $connection = ConnectionManager::get('default');
    
        if ($connection) {
            return true;
            // echo "Successfully connected to the database: " . env('DB_DATABASE') . "<br>"; vuleo uncommit koris na vai ata
            
        } else {
            // echo "Failed to connect to the database";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    
}

