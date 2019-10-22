<?php

class User{
    private $userId ; 
    private $userName; 
    private $userFirstname; 
    private $userLastname; 
    private $userEmail ;
    private $userAddress ; 
    private $userPassword ; 
    private $userRole ;
    private $userPicture;
            
    function getUserId() {
        return $this->userId;
    }

    function getUserName() {
        return $this->userName;
    }

    function getUserFirstname() {
        return $this->userFirstname;
    }

    function getUserLastname() {
        return $this->userLastname;
    }

    function getUserEmail() {
        return $this->userEmail;
    }

    function getUserAddress() {
        return $this->userAddress;
    }

    function getUserPassword() {
        return $this->userPassword;
    }

    function getUserRole() {
        return $this->userRole;
    }
    
    function getUserPicture() {
        return $this->userPicture;
    }

        function setUserId($userId) {
        $this->userId = $userId;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setUserFirstname($userFirstname) {
        $this->userFirstname = $userFirstname;
    }

    function setUserLastname($userLastname) {
        $this->userLastname = $userLastname;
    }

    function setUserEmail($userEmail) {
        $this->userEmail = $userEmail;
    }

    function setUserAddress($userAddress) {
        $this->userAddress = $userAddress;
    }

    function setUserPassword($userPassword) {
        $this->userPassword = $userPassword;
    }

    function setUserRole($userRole) {
        $this->userRole = $userRole;
    }

    function setUserPicture($userPicture) {
        $this->userPicture = $userPicture;
    }

    function __construct($userId, $userName, $userFirstname, $userLastname, $userEmail, $userAddress, $userPassword, $userRole, $userPicture) {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->userFirstname = $userFirstname;
        $this->userLastname = $userLastname;
        $this->userEmail = $userEmail;
        $this->userAddress = $userAddress;
        $this->userPassword = $userPassword;
        $this->userRole = $userRole;
        $this->userPicture = $userPicture;
    }


    
}

 