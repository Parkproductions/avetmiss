<?php

namespace Bdt\Avetmiss\Nat\V7;

use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\Fields\Field;

/**
 * Fieldset for the AVETMISS V7 Nat060
 *
 * The Subject (NAT00060) file contains a record for each unit of competency or
 * module associated with enrolment activity during the collection period.
 *
 * A unit of competency or module can be studied independently but is usually
 * offered as part of a qualification, course or skill set.
 */
class Nat060 extends Fieldset
{

    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        parent::__construct(
            [
                Field::make('any')->name('muc_flag')->length(1),
                Field::make('any')->name('unit_display_id')->length(12),
                Field::make('any')->name('unit_name')->length(100),
                Field::make('any')->name('module_field_of_education')->length(6),
                Field::make('any')->name('vet_flag')->length(1),
                Field::make('numeric')->name('nominal_hours')->length(4),
            ]
        );
    }
}
