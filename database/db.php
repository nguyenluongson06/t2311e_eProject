<?php
//global connect func
function connect()
{
    $host = "127.0.0.1";
    $user = "root";
    $pwd = "root";
    $db = "card_shop";
    $conn = new mysqli($host, $user, $pwd, $db);
    if ($conn->connect_error)
        die("Connect refused!");
    return $conn;
}

function query($sql)
{
    $conn = connect();
    return $conn->query($sql);
}

//specific functions for each type 
function get_cards()
{
    $sql = "select * from cards";
    $result = query($sql);
    $card_list = [];
    while ($row = $result->fetch_assoc()) {
        $card_list[] = $row;
    }
    return $card_list;
}

function get_categories()
{
    $sql = "select * from categories";
    $result = query($sql);
    $category_list = [];
    while ($row = $result->fetch_assoc()) {
        $category_list[] = $row;
    }
    return $category_list;
}

function get_manufacturers()
{
    $sql = "select * from manufacturers";
    $result = query($sql);
    $manufacturer_list = [];
    while ($row = $result->fetch_assoc()) {
        $manufacturer_list[] = $row;
    }
    return $manufacturer_list;
}

function card_detail($id)
{
    $sql = "select * from cards where id = $id";
    $result = query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}

function category_detail($id)
{
    $sql = "select * from categories where id = $id";
    $result = query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}

function manufacturer_detail($id)
{
    $sql = "select * from manufacturers where id = $id";
    $result = query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}