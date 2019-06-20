<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Traits\Navigation;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

trait AddsNavigation {

    protected function addNavigation() {
        foreach ($this->navigation as &$link) {
            $link['class'] = Request::is($link['href']) ? 'active' : '';
        }

        View::share('navigation', $this->navigation);
    }

}
