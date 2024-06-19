<?php
session_start();
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

function get_card_detail($card_id)
{
    $sql = "select * from cards where id = $card_id";
    $result = query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}

function get_category_detail($category_id)
{
    $sql = "select * from categories where id = $category_id";
    $result = query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}

function get_manufacturer_detail($manufacturer_id)
{
    $sql = "select * from manufacturers where id = $manufacturer_id";
    $result = query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}

function get_card_in_category($category_id)
{
    $sql = "select * from cards where category_id = $category_id";
    $result = query($sql);
    $card_list = [];
    while ($row = $result->fetch_assoc()) {
        $card_list[] = $row;
    }
    return $card_list;
}

function get_card_in_manufacturer($manufacturer_id)
{
    $sql = "select * from cards where manufacturer_id = $manufacturer_id";
    $result = query($sql);
    $card_list = [];
    while ($row = $result->fetch_assoc()) {
        $card_list[] = $row;
    }
    return $card_list;
}

function get_related_cards($card_id)
{
    $card_info = get_card_detail($card_id);
    $category_id = $card_info["category_id"];
    $sql = "select * from cards where category_id = $category_id limit 8";
    $result = query($sql);
    $card_list = [];
    while ($row = $result->fetch_assoc()) {
        $card_list[] = $row;
    }
    return $card_list;
}

function get_cart()
{
    $cart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];
    if (count($cart) > 0) {
        $card_ids = [];
        foreach ($cart as $id => $qty) {
            $card_ids[] = $id;
        }
        $cart_ids = implode(",", $card_ids);
        $sql = "select * from cards where id in ($cart_ids)";
        $result = query($sql);
        $list = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = $row;
        }
        return $list;
    }
    return [];
}

function get_last_cart_info()
{
    $cart = isset($_SESSION["last_order_info"]["cart"]) ? $_SESSION["last_order_info"]["cart"] : [];
    if (count($cart) > 0) {
        $card_ids = [];
        foreach ($cart as $id => $qty) {
            $card_ids[] = $id;
        }
        $cart_ids = implode(",", $card_ids);
        $sql = "select * from cards where id in ($cart_ids)";
        $result = query($sql);
        $list = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = $row;
        }
        return $list;
    }
    return [];
}

function newest_cards()
{
    $sql = "select * from cards order by id desc limit 9";
    $result = query($sql);
    $list = [];
    while ($row = $result->fetch_assoc()) {
        $list[] = $row;
    }
    return $list;
}

function best_sellers()
{
    $sql = "select * from cards order by manufacturer_id desc limit 9";
    $result = query($sql);
    $list = [];
    while ($row = $result->fetch_assoc()) {
        $list[] = $row;
    }
    return $list;
}

function hot_items()
{
    $sql = "select * from cards order by category_id desc limit 9";
    $result = query($sql);
    $list = [];
    while ($row = $result->fetch_assoc()) {
        $list[] = $row;
    }
    return $list;
}

function get_count_category($category_id)
{
    $sql = "select count(category_id) as count from cards where category_id = $category_id";
    $result = query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();// 1 product
    }
}

function get_count_manufacturer($manufacturer_id)
{
    $sql = "select count(manufacturer_id) as count from cards where manufacturer_id = $manufacturer_id";
    $result = query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();// 1 product
    }
}