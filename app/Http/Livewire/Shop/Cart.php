<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

use App\Facades\Cart as Carts;
class Cart extends Component
{
    public $cart;
    
    public function mount(){
        $this->cart = Carts::get();
    }
    public function removeFromCart($id){
        Carts::remove($id);
        $this->cart = Carts::get();
        $this->emit('removeFromCart');
    }
    public function render()
    {
        return view('livewire.shop.cart');
    }
}
