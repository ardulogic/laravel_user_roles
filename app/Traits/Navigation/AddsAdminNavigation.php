<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Traits\Navigation;

trait AddsAdminNavigation {
    
    use AddsNavigation;    
    
    protected $navigation = [
        ['href' => '/dice', 'title' => 'Kauliukas']
    ];
    
}