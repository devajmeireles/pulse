<?php

namespace Laravel\Pulse\Livewire\Concerns;

use Carbon\CarbonInterval;
use Livewire\Attributes\Url;

trait HasPeriod
{
    /**
     * The usage period.
     */
    #[Url]
    public ?string $period = '1h';

    /**
     * The default periods.
     *
     * @var array<string, int>
     */
    public array $defaults = [
        '1h' => 1,
        '6h' => 6,
        '24h' => 24,
        '7d' => 168,
    ];

    /**
     * The available periods.
     *
     * @return array<string, int>
     */
    public function periods(): array
    {
        return config('pulse.periods', $this->defaults);
    }

    /**
     * The period as an Interval instance.
     */
    public function periodAsInterval(): CarbonInterval
    {
        return CarbonInterval::hours($this->periods()[$this->period] ?? 1);
    }

    /**
     * The human friendly representation of the selected period.
     */
    public function periodForHumans(): string
    {
        return collect($this->periods())
            ->map(fn (int $hours, string $key): array => [
                'key' => $key,
                'label' => (string) $hours,
            ])
            ->firstWhere('key', '=', $this->period)['label'] ?? '1h';
    }
}
