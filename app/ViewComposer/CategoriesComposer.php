<?php

namespace App\ViewComposer;

use App\Category;
use Illuminate\View\View;

class CategoriesComposer
{
    public function compose(View $view)
    {
        $categories = Category::get();
        $view->with('categories', $categories);
    }
}