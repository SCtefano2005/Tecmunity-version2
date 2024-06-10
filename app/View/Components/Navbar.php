<?php
namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $usuario;

    public function __construct()
    {
        $this->usuario = Auth::user();
    }

    public function render()
    {
        return view('components.navbar');
    }
}

