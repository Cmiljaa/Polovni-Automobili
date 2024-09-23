<?php

namespace App\View\Components;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavBar extends Component
{
    public $isAdmin;
    public $isAuth;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->isAuth = Auth::check();
        $this->isAdmin = Auth::check() ? Auth::user()->is_admin : false;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav-bar');
    }
}
