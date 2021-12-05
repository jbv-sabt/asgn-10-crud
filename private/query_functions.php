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
    $sql .= "." . $description . "'";
    $sql .= ")";

    $result = mysqli_query($db, $sql);
    //for insert statements, $result returns t/f
    if($result) {
        return true;
    }
    else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db)
    exit();
    }
}