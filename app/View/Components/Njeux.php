<?php

namespace App\View\Components;

use App\Models\Jeu;
use Illuminate\View\Component;

class Njeux extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $n;
    protected $tab1 = [];
    public function __construct($n)
    {
        $jeux = Jeu::all();
        for ($i=$n; $i<$n+5; $i++) {
            if(count($jeux) > $i) {
                $this->tab1[] = $jeux[$i];
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.njeux', ["tab1"=>$this->tab1]);
    }
}
