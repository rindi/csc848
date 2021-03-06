<?php

/*
@(#)File:           Profile_Model Class
@(#)Purpose:        Model for Customer Profile
@(#)Author:         PrimeEstate
@(#)Product:        PrimeEstate Website 2014
*/

class profile_model {

    //fields for userdata class
    public $bedrooms, $bathrooms, $pricemax, $pricemin, $zip, $personalinformation, $userid, $city;

    public function __construct($dbRow) {

        $this->bedrooms = $dbRow['bedrooms'];
        $this->bathrooms = $dbRow['bathrooms'];
        $this->pricemax = $dbRow['pricemax'];
        $this->pricemin = $dbRow['pricemin'];
        $this->zip = $dbRow['zip'];
        $this->personalinformation = $dbRow['personalinformation'];
        $this->userid = $dbRow['userid'];
        $this->city = $dbRow['city'];
    }

    public function info() {
        echo "$this->bedrooms\n";
        echo "$this->bathrooms\n";
        echo "$this->pricemax\n";
        echo "$this->pricemin\n";
        echo "$this->zip\n";
        echo "$this->personalinformation\n";
    }

    public function getBathrooms() {
        return $this->bathrooms;
    }

    public function getBedrooms() {
        return $this->bedrooms;
    }

    public function getPricemin() {
        return $this->pricemin;
    }

    public function getPricemax() {
        return $this->pricemax;
    }

    public function getZip() {
        return $this->zip;
    }

    public function getPersonalInformation() {
        return $this->personalinformation;
    }

    public function getUserid() {
        return $this->userid;
    }

    public function setBathrooms($bathrooms) {
        $this->bathrooms = $bathrooms;
    }

    public function setBedrooms($input) {
        $this->bedrooms = $input;
    }

    public function setPricemin($input) {
        $this->pricemin = $input;
    }

    public function setPricemax($input) {
        $this->pricemax = $input;
    }

    public function setZip($input) {
        $this->zip = $input;
    }

    public function setPersonalInformation($input) {
        $this->personalinformation = $input;
    }

    public function setUserid($input) {
        $this->userid = $input;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

}

?>
