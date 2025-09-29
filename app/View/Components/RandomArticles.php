<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class RandomArticles extends Component
{
    /**
     * Create a new component instance.
     */

    public $articles;   
    public $title;      

    public function __construct($count = 3, $excludeId = null, $title = 'Random articles')
    {
        $this->title = $title;
        
        $query = DB::table('articles')
            ->inRandomOrder()
            ->limit($count);

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        $this->articles = $query->get()->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.random-articles');
    }
}
