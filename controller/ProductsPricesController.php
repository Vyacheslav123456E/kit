<?php

require_once __DIR__ . '/../models/PricesModel.php';
require_once __DIR__ . '/../entities/Prices.php';
require_once __DIR__ . '/../util/Response.php';

class ProductsPricesController{
    private PricesModel $prices_model;

    public function __construct(){
        $this->prices_model = new PricesModel();
    }

    public function actionCreateUpdate($data){
        $prices = new Prices();
        $result = new ArrayObject();
        foreach ($data as $productData) {
            $productId = $productData->product_id;

            foreach ($productData->prices as $regionId => $priceData) {
                $prices->setPricePurchase( $priceData->price_purchase);
                $prices->setPriceSelling( $priceData->price_selling);
                $prices->setPriceDiscount( $priceData->price_discount);
                $prices->setProductId((int) $productId);
                $prices->setRegionId((int) $regionId);

                if ($this->prices_model->create_update($prices)) {
                    $result->append(['res' => true, 'product_id' => '']);
                } else {
                    $result->append(['res' => false, 'product_id' => $productId]);
                }
            }
        }
        foreach ($result as $res) {
            if ($res['res']) {
                return Response::sendWithCode(201, "new products created and update");
            } else {
                return Response::sendWithCode(500, $res);
            }
        }
        return null;
    }
}