<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Menu;

class MenuComposer
{
    public function compose(View $view)
    {
        // Fetch the menu data from your data source
        $view->with('menus', Menu::all());
    }
}
