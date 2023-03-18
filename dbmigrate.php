<?php

require_once('Database.php');

// Directory containing the SQL files
$sqlDir = './datatables';

// Get the database connection
$db = Database::getInstance()->getConnection();

// Loop through all .sql files in the directory
foreach (glob($sqlDir . '/*.sql') as $file) {
    // Read the SQL file contents
    $sql = file_get_contents($file);

    // Execute the SQL query
    if ($db->multi_query($sql)) {
        // Output success message
        echo "Table(s) created from file: " . basename($file) . "\n";
    } else {
        // Output error message
        echo "Error creating table(s) from file: " . basename($file) . "\n";
        echo $db->error . "\n";
    }

    // Close any remaining result sets
    while ($db->more_results() && $db->next_result()) {
        // Do nothing
    }
}

// Close the database connection
$db->close();
