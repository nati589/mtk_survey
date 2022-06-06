<?php
    include("db.inc.php");
    $db= $conn;

    function fetch_data($db, $table, $columns){
        if(empty($db)){

            $msg= "Database connection error";

        }else if (empty($columns) || !is_array($columns)) {

            $msg="columns Name must be defined in an indexed array";

        }elseif(empty($table)){

            $msg= "Table Name is empty";

        }else{
            $columnname = implode(", ", $columns);

            $query = "SELECT ".$columnname." FROM $table"." ORDER BY id DESC";
            $result = $db->query($query);

            if($result== true){ 

                if ($result->num_rows > 0) {

                    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $msg= $row;

                } else {

                $msg= "No Data Found"; 
                }

            }else{

                $msg= mysqli_error($db);

                }
            }
        return $msg;
    }
?>