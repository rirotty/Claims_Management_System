<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ticket
 *
 * @author Rirotty
 */
class Ticket {
    private $ticketId;
    private $ticketuserId;
    private $ticketproductId;
    private $ticketmoduleId;
    private $ticketDescription;
    private $ticketopeningDate;
    private $ticketclosingDate;
    private $ticketStatus;
    private $ticketassignedTo;
    private $ticketAttachment;
    private $ticketPatch;
                function getTicketId() {
        return $this->ticketId;
    }

    function getTicketuserId() {
        return $this->ticketuserId;
    }

    function getTicketproductId() {
        return $this->ticketproductId;
    }

    function getTicketmoduleId() {
        return $this->ticketmoduleId;
    }

    function getTicketDescription() {
        return $this->ticketDescription;
    }

    function getTicketopeningDate() {
        return $this->ticketopeningDate;
    }

    function getTicketclosingDate() {
        return $this->ticketclosingDate;
    }

    function getTicketStatus() {
        return $this->ticketStatus;
    }

    function getTicketassignedTo() {
        return $this->ticketassignedTo;
    }

    function getTicketAttachment() {
        return $this->ticketAttachment;
    }
    function getTicketPatch() {
        $utf=rawurlencode($this->ticketPatch);
        return $utf;
    }

    
    function setTicketId($ticketId) {
        $this->ticketId = $ticketId;
    }

    function setTicketuserId($ticketuserId) {
        $this->ticketuserId = $ticketuserId;
    }

    function setTicketproductId($ticketproductId) {
        $this->ticketproductId = $ticketproductId;
    }

    function setTicketmoduleId($ticketmoduleId) {
        $this->ticketmoduleId = $ticketmoduleId;
    }

    function setTicketDescription($ticketDescription) {
        $this->ticketDescription = $ticketDescription;
    }

    function setTicketopeningDate($ticketopeningDate) {
        $this->ticketopeningDate = $ticketopeningDate;
    }

    function setTicketclosingDate($ticketclosingDate) {
        $this->ticketclosingDate = $ticketclosingDate;
    }

    function setTicketStatus($ticketStatus) {
        $this->ticketStatus = $ticketStatus;
    }

    function setTicketassignedTo($ticketassignedTo) {
        $this->ticketassignedTo = $ticketassignedTo;
    }

    function setTicketAttachment($ticketAttachment) {
        $this->ticketAttachment = $ticketAttachment;
    }
    function setTicketPatch($ticketPatch) {
        $this->ticketPatch = $ticketPatch;
    }

    
    function __construct($ticketId, $ticketuserId, $ticketproductId, $ticketmoduleId, $ticketDescription, $ticketopeningDate, $ticketclosingDate, $ticketStatus, $ticketassignedTo, $ticketAttachment, $ticketPatch) {
        $this->ticketId = $ticketId;
        $this->ticketuserId = $ticketuserId;
        $this->ticketproductId = $ticketproductId;
        $this->ticketmoduleId = $ticketmoduleId;
        $this->ticketDescription = $ticketDescription;
        $this->ticketopeningDate = $ticketopeningDate;
        $this->ticketclosingDate = $ticketclosingDate;
        $this->ticketStatus = $ticketStatus;
        $this->ticketassignedTo = $ticketassignedTo;
        $this->ticketAttachment = $ticketAttachment;
        $this->ticketPatch = $ticketPatch;
    }


}
    
    