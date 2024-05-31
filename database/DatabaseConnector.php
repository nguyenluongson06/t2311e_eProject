<?php
use Random\RandomException;

class DatabaseConnector
{
    private $host = "127.0.0.1";
    private $user = "root";
    private $pwd = "root";
    private $db = "card_shop";
    private function query($sql)
    {
        $conn = new mysqli($this->host, $this->user, $this->pwd, $this->db);
        return $conn->query($sql);
    }
    public function get_all_cards()
    {
        $sql = "select * from cards";
        $result = $this->query($sql);
        $card_list = [];
        while ($row = $result->fetch_assoc()) {
            $card_list[] = $row;
        }
        return $card_list;
    }

    public function get_all_category()
    {
        $sql = "select * from categories";
        $result = $this->query($sql);
        $category_list = [];
        while ($row = $result->fetch_assoc()) {
            $category_list[] = $row;
        }
        return $category_list;
    }

    public function get_all_manufacturer()
    {
        $sql = "select * from manufacturers";
        $result = $this->query($sql);
        $manufacturer_list = [];
        while ($row = $result->fetch_assoc()) {
            $manufacturer_list[] = $row;
        }
        return $manufacturer_list;
    }

    public function card_detail($id)
    {
        $sql = "select * from cards where id = $id";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }

    public function category_detail($id)
    {
        $sql = "select * from categories where id = $id";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }

    public function manufacturer_detail($id)
    {
        $sql = "select * from manufacturers where id = $id";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }
}