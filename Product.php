<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author Rirotty
 */
class Product {
    private $productId;
    private $productName;
    private $productDescription;
    private $productVersion;
    private $productclientId;
    
    function getProductId() {
        return $this->productId;
    }

    function getProductName() {
        return $this->productName;
    }

    function getProductDescription() {
        return $this->productDescription;
    }

    function getProductVersion() {
        return $this->productVersion;
    }
    
    function getProductclientId() {
        return $this->productclientId;
    }
    
    function setProductId($productId) {
        $this->productId = $productId;
    }

    function setProductName($productName) {
        $this->productName = $productName;
    }

    function setProductDescription($productDescription) {
        $this->productDescription = $productDescription;
    }

    function setProductVersion($productVersion) {
        $this->productVersion = $productVersion;
    }
    
    function setProductclientId($productclientId) {
        $this->productclientId = $productclientId;
    }

    function __construct($productId, $productName, $productDescription, $productVersion, $productclientId) {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->productDescription = $productDescription;
        $this->productVersion = $productVersion;
        $this->productclientId = $productclientId;
    }




    
    
}


