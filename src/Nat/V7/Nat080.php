<?php

namespace Bdt\Avetmiss\Nat\V7;

use Bdt\Avetmiss\Fieldset;
use Bdt\Avetmiss\Fields\Field;

/**
 * Fieldset for the AVETMISS V7 Nat080
 *
 * The Client (NAT00080) file contains a record for each client who has
 * participated in VET activity during the collection period or whose completion
 * of a program of study is reported during the collection period.
 *
 * A client is an individual who is engaged in or has completed a program of
 * study.
 */
class Nat080 extends Fieldset
{

    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        parent::__construct(
            [
                Field::make('any')->name('client_id')->length(10),
                Field::make('any')->name('name_for_encryption')->length(60),
                Field::make('any')->name('highest_school_level_completed')->length(2),
                Field::make('any')->name('year_highest_school_level_completed')->length(4),
                Field::make('any')->name('sex')->length(1),
                Field::make('date')->name('date_of_birth')->length(8),
                Field::make('any')->name('postcode')->length(4)->pad('0'),
                Field::make('any')->name('indigenous_status_id')->length(1),
                Field::make('any')->name('language_id')->length(4),
                Field::make('any')->name('labour_force_status_id')->length(2),
                Field::make('any')->name('country_id')->length(4),
                Field::make('any')->name('disability_flag')->length(1),
                Field::make('any')->name('prior_educational_achievement_flag')->length(1),
                Field::make('any')->name('at_school_flag')->length(1),
                Field::make('any')->name('proficiency_in_spoken_english_id')->length(1),
                Field::make('any')->name('address_location_suburb_locality_or_town')->length(50),
                Field::make('any')->name('unique_student_id')->length(10),
                Field::make('numeric')->name('state_id')->length(2)->pad('0'),
                Field::make('any')->name('address_building_property_name')->length(50),
                Field::make('any')->name('address_flat_unit_details')->length(30),
                Field::make('any')->name('address_street_number')->length(15),
                Field::make('any')->name('address_street_name')->length(70),
                Field::make('any')->name('statistical_area_level_1_id')->length(11),
                Field::make('any')->name('statistical_area_level_2_id')->length(9),
            ]
        );
    }
}
