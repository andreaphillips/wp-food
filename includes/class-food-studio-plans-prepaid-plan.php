<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Food_Studio_Plans_Prepaid_Plan extends WC_Product {
    public function __construct( $product ) {
        $this->product_type = 'prepaid_plan';
        parent::__construct( $product );
    }
}