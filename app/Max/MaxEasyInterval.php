<?php


namespace App\Max;


class MaxEasyInterval
{

    /** @var int */
    private $seconds = 0;

    /** @var int */
    private $minutes = 0;

    /** @var int */
    private $hours = 0;

    /** @var int */
    private $days = 0;

    /** @var int */
    private $months = 0;

    /** @var int */
    private $years = 0;

    /** @var \DateInterval */
    private $dateInterval;

    /**
     * MaxEasyInterval constructor.
     * @param int | null $seconds
     * @param int | null $minutes
     * @param int | null $hours
     * @param int | null $days
     * @param int | null $months
     * @param int | null $years
     * @throws \Exception
     */
    public function __construct($seconds = 0, $minutes = 0, $hours = 0, $days = 0, $months = 0, $years = 0)
    {
        $this->seconds = $seconds;
        $this->minutes = $minutes;
        $this->hours = $hours;
        $this->days = $days;
        $this->months = $months;
        $this->years = $years;

        $dateString = sprintf('P%sY%sM%sDT%sH%sM%sS',
            (string)$years,
            (string) $months,
            (string) $days,
            (string) $hours,
            (string) $minutes,
            (string) $seconds);

        try {
            $this->dateInterval = new \DateInterval($dateString);
        } catch (\Throwable $exception)
        {
            Throw new \Exception('DateInterval not correctly formed');
        }
    }

    /**
     * @return int
     */
    public function getSeconds(): int
    {
        return $this->seconds;
    }

    /**
     * @return int
     */
    public function getMinutes(): int
    {
        return $this->minutes;
    }

    /**
     * @return int
     */
    public function getHours(): int
    {
        return $this->hours;
    }

    /**
     * @return int
     */
    public function getDays(): int
    {
        return $this->days;
    }

    /**
     * @return int
     */
    public function getMonths(): int
    {
        return $this->months;
    }

    /**
     * @return int
     */
    public function getYears(): int
    {
        return $this->years;
    }

    /**
     * @return \DateInterval
     */
    public function getDateInterval(): \DateInterval
    {
        return $this->dateInterval;
    }
}