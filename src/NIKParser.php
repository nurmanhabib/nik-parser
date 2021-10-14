<?php

namespace Nurmanhabib\NIKParser;

use Carbon\Carbon;
use Carbon\Exceptions\Exception;
use Nurmanhabib\NIKParser\Exceptions\InvalidLengthException;

class NIKParser
{
    const SEX_MALE = 'male';
    const SEX_FEMALE = 'female';

    protected string $nik;

    /**
     * @throws InvalidLengthException
     */
    public function __construct(string $nik)
    {
        if (strlen($nik) != 16) {
            throw new InvalidLengthException($nik);
        }

        $this->nik = $nik;
    }

    /**
     * @return bool
     */
    public function isValidDateOfBirth(): bool
    {
        return $this->getDateOfBirth() !== null;
    }

    /**
     * @return Carbon|null
     */
    public function getDateOfBirth(): ?Carbon
    {
        $datePreformat = substr($this->nik, 6, 6);
        $dates = str_split($datePreformat, 2);
        $day = $dates[0];
        $day = (int) $day;

        if ($day > 40) {
            $day -= 40;
            $dates[0] = str_pad($day, 2, '0', STR_PAD_LEFT);
        }

        try {
            return Carbon::createFromFormat('dmy', implode('', $dates));
        } catch (Exception $e) {}

        return null;
    }

    /**
     * @return string|null
     */
    public function getSex(): ?string
    {
        $datePreformat = substr($this->nik, 6, 6);

        if (strlen($datePreformat) == 6) {
            $dates = str_split($datePreformat, 2);
            $day = $dates[0];
            $day = (int) $day;

            return $day > 40 ? self::SEX_FEMALE : self::SEX_MALE;
        }

        return null;
    }

    /**
     * @return string
     */
    public function getNIK(): string
    {
        return $this->nik;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getNIK();
    }
}
