<?php

require_once __DIR__."/../util/Database.php";
require_once __DIR__."/../entities/Products.php";

class PricesModel{
    private $db_conn;

    public function __construct(){
        $this->db_conn = Database::getConnection();
    }

    public function create_update($prices){
        $findId = 0;
        $sqlCheck = "SELECT * FROM product_prices WHERE product_id=".$prices->getProductId()." AND region_id=".$prices->getRegionId();
        $resultCheck = $this->db_conn->query($sqlCheck);
        while($row = $resultCheck->fetch_assoc()) {
            $findId = $row["id"];
        }
        if ($resultCheck->num_rows > 0) {
            $update_sql = "UPDATE `product_prices` SET `price_purchase`='" . $prices->getPricePurchase() . "',
                                           `price_selling`='" . $prices->getPriceSelling() . "',
                                           `price_discount`='" . $prices->getPriceDiscount() . "',
                                           `product_id`='" . $prices->getProductId() . "',
                                           `region_id`='" . $prices->getRegionId() . "'
                                            WHERE `id`=" . $findId;

            if ($this->db_conn->query($update_sql) === true) {
                return true;
            } else {
                echo "Error: " . $update_sql . " " . $this->db_conn->error;
                return false;
            }
        }else{
            $insert_sql = "INSERT INTO `product_prices`(`price_purchase`,`price_selling`,`price_discount`,`product_id`,`region_id`) ".
                "VALUES ('".$prices->getPricePurchase()."','".$prices->getPriceSelling()."','".$prices->getPriceDiscount()."',
                      '".$prices->getProductId()."','".$prices->getRegionId()."')";
            if ($this->db_conn->query($insert_sql) === true) {
                return true;
            } else {
                echo "Error: " . $insert_sql . " " . $this->db_conn->error;
                return false;
            }
        }
    }
    public function findProductId($id){

        $select_sql = "SELECT * FROM `product_prices` WHERE `product_id` = ".$id;
        $result = $this->db_conn->query($select_sql);

        if ($result->num_rows > 0) {
            $prices = [];
            while($row = $result->fetch_assoc()) {
                array_push($prices, (new Prices($row["id"],$row["price_purchase"],$row["price_selling"],$row["price_discount"],
                    $row["productid"],$row["countryid"]))->toAssoc());
            }
            return $prices;
        } else {
            return false;
        }

    }
    public function findAll(){

        $select_sql = "SELECT * FROM `product_prices`";
        $result = $this->db_conn->query($select_sql);

        if ($result->num_rows > 0) {
            $prices = [];
            while($row = $result->fetch_assoc()) {
                array_push($prices,(
                new Prices(
                    $row["id"],
                    $row["price_purchase"],
                    $row["price_selling"],
                    $row["price_discount"],
                    $row["product_id"],
                    $row["country_id"]

                ))->toAssoc());
            }
            return $prices;

        } else {
            return new Prices();
        }

    }
    public function delete($prices){}
}