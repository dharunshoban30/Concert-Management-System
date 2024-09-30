<?php

namespace App\View\Components;
use Illuminate\View\Component;

class AdminLayout extends Component{
    /**
     * 
     * 
     * @return \Illuminate\View\View
     */
    public function render(){
        return view('layouts.admin');
    }
}