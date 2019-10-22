<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Module
 *
 * @author Rirotty
 */
class Module {
    private $moduleId;
    private $moduleName;
    
    
    function getModuleId() {
        return $this->moduleId;
    }

    function getModuleName() {
        return $this->moduleName;
    }

    function setModuleId($moduleId) {
        $this->moduleId = $moduleId;
    }

    function setModuleName($moduleName) {
        $this->moduleName = $moduleName;
    }

    function __construct($moduleId, $moduleName) {
        $this->moduleId = $moduleId;
        $this->moduleName = $moduleName;
    }

    
}
