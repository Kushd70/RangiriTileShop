<?php
    // start the session........
    session_start();

    // capture the table mappings........
    include('table_columns.php');

    // capture the table name....
    $table_name = $_SESSION['table'];
    $columns = $table_columns_mapping[$table_name];

    
    // loop throught the columns.......
    $db_arr = [];
    // get the the user data....
    $user = $_SESSION['user'];

    foreach($columns as $column){
        if(in_array($column, ['created_at', 'update_at'])) $value = date('Y-m-d H:i:s');
        else if ($column == 'created_by') $value = $user['id'];
        else $value = isset($_POST[$column]) ? $_POST[$column] : '';

        $db_arr[$column] = $value;
    }

    // format.........
    $table_properties = implode(", ", array_keys($db_arr));
    $table_values = implode(", ", array_values($db_arr));

    // Adding to the record.........
    try
    {
        $command = "INSERT INTO $table_name($table_properties)
        VALUES ($table_values)";

        include('connection.php');

        $conn->exec($command);
        $response = [
            'success => true',
            'message' => "sd"
        ];
    }
    catch (PDOException $e)
    {

    }
