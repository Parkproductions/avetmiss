<?php

namespace Bdt\Avetmiss;

use DateTime;

/**
 * Helper functions for working with AVETMISS.
 */
class Utilities
{

    /**
     * Converts a MySQL formatted date (Y-m-d) to AVETMISS format (dmY).
     *
     * @param string $mysql
     *
     * @return string
     */
    public static function toDate($mysql = null)
    {
        if (is_null($mysql)) {
            return null;
        }

        return date_format(new DateTime($mysql), 'dmY');
    }

    /**
     * Create an encryption string for AVETMISS.
     *
     * @param string $firstName
     * @param string $lastName
     *
     * @param string $middleName
     *
     * @return string
     */
    public static function toNameForEncryption($firstName = '', $lastName = '', $middleName = '')
    {
        // if the student has only 1 name, report it as the last name
        if ($lastName == '' && $middleName == '') {
            return $firstName . ',';
        }

        if($lastName == '' && $middleName != '') {
            return $firstName . ', ' . $middleName;
        }

        return $lastName . ', ' . $firstName . " " . $middleName;
    }
}
