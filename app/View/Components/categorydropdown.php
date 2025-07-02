<?php

namespace App\View\Components;

use App\Models\category;
use Illuminate\View\Component;

class categorydropdown extends Component
{
    public function render()
    {
        return view('components.categorydropdown', [
            'categories' => category::all(),
            'currentcategory' => request('category')
                ? category::where('slug', request('category'))->first()
                : null
        ]);
    }
}
