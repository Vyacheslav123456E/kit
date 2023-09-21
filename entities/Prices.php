<?php


class Prices{
    private $id;
    private $price_purchase;
    private $price_selling;
    private $price_discount;
    private $product_id;
    private $region_id;

    public function __construct($id = null, $price_purchase = null,$price_selling = null,$price_discount = null,
                                $product_id = null, $region_id = null){
        $this->id = $id;
        $this->price_purchase = $price_purchase;
        $this->price_selling = $price_selling;
        $this->price_discount = $price_discount;
        $this->product_id = $product_id;
        $this->region_id = $region_id;
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getPricePurchase(){
        return $this->price_purchase;
    }
    public function setPricePurchase($price_purchase){
        $this->price_purchase = $price_purchase;
    }
    public function getPriceSelling(){
        return $this->price_purchase;
    }
    public function setPriceSelling($price_selling){
        $this->price_selling = $price_selling;
    }
    public function getPriceDiscount(){
        return $this->price_discount;
    }
    public function setPriceDiscount($price_discount){
        $this->price_discount = $price_discount;
    }
    public function getProductId(){
        return $this->product_id;
    }
    public function setProductId($product_id){
        $this->product_id = $product_id;
    }
    public function getRegionId(){
        return $this->region_id;
    }
    public function setRegionId($region_id){
        $this->region_id = $region_id;
    }

    public function toJson()
    {
        return json_encode(array(
            'id' => $this->getId(),
            'price_purchase' => $this->getPricePurchase(),
            'price_selling' => $this->getPriceSelling(),
            'price_discount' => $this->getPriceDiscount(),
            'product_id' => $this->getProductId(),
            'region_id' => $this->getRegionId()
        ));
    }

    public function toAssoc()
    {
        return array(
            'id' => $this->getId(),
            'price_purchase' => $this->getPricePurchase(),
            'price_selling' => $this->getPriceSelling(),
            'price_discount' => $this->getPriceDiscount(),
            'product_id' => $this->getProductId(),
            'region_id' => $this->getRegionId()
        );
    }
}