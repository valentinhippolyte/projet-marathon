<?php

namespace App\View\Components;

use App\Models\Jeu;
use Illuminate\View\Component;


// Test du component dans le welcome.blade.php

class CardGame extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $jeux;
    public function __construct($id)
    {
        $jeux = Jeu::all()->find($id);
        $this->jeux = $jeux;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.card-game', ['jeux'=>$this->jeux]);
    }
}
