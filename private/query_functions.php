<?php

function find_all_salamanders() {
    global $db;
    $sql = "SELECT * FROM salamander ";
    $sql .= "ORDER BY name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_salamander_by_id($id) {
    global $db;

    $sql = "SELECT * FROM salamander ";
    $sql .= "WHERE id = '" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $salamander = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $salamander; //returns assoc array

   
}

function insert_salamander($name, $habitat, $description){
    global $db;
    
    $sql = "INSERT INTO salamander ";
    $sql .= "(name, habitat, description) ";
    $sql .= "VALUES (";
    $sql .= "'" .  $name . "',";
    $sql .= "'" . $habitat . "',";
    $sql .= "'" . $description . "'";
    $sql .= ")";

    $result = mysqli_query($db, $sql);
    //for insert statements, $result returns t/f
    if($result) {
        return $result;
    }
    else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit();
    }
}

function update_salamander($salamander) {
    global $db;

    $sql = "UPDATE salamander ";
    $sql .= "SET ";
    $sql .= "name ='" . $salamander['name'] . "', ";
    $sql .= "habitat ='" . $salamander['habitat'] . "',";
    $sql .= "description ='" . $salamander['description'] . "'";
    $sql .= "WHERE id='" . $salamander['id'] . "' ";
    $sql .= "LIMIT 1";
    
    $result = mysqli_query($db,$sql);
    $id = $salamander['id'];
   
    // FOR update statements, $result is t/f
    
    if($result) {
        
        redirect_to(h(url_for('/salamanders/show.php?id=' . $id)));
       
    }
    else {
        //update failed
        echo mysqli_error($db);
        echo $sql;
        db_disconnect($db);
        exit();
    }
}