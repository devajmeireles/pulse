<?php

namespace Laravel\Pulse\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\View;
use Livewire\Component;

/**
 * @internal
 */
class PeriodSelector extends Component
{
    use Concerns\HasPeriod;

    /**
     * Render the component.
     */
    public function render(): Renderable
    {
        return View::make('pulse::livewire.period-selector', [
            'periods' => $this->periods(),
            'current' => $this->period,
        ]);
    }
}
