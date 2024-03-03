<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Products;


class Popular_products extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $Products =  Products::where('Pdt_Catagory','=','Jewellery')->take(10)->get();
        return view("components.popular_products",compact("Products")); 
    }
}
