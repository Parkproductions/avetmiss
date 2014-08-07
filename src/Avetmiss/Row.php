<?php namespace Avetmiss;

use Avetmiss\File;
use Avetmiss\Fields\Field;
use Avetmiss\UnexistingFieldException;
use Avetmiss\FieldNotSetException;


abstract class Row
{

    protected $fields = [];


    /**
     *  Adds a field to this row' structure
     */
    public function addField(Field $field)
    {
        $this->fields[$field->getName()] = $field;
        
        return $this;
    }


    /**
     * Shortcut to add multiple fields
     */
    public function addFields(array $fields)
    {
        foreach($fields as $field)
        {
            $this->addField($field);
        }
    }


    /**
     *  Returns the field named $name
     */
    public function getField($name)
    {
        if(!array_key_exists($name, $this->fields))
        {
            throw new UnexistingFieldException($name .' doesn\'t exist in '. get_called_class());
        }

        return $this->fields[$name];
    }

    /*
     * returns a row populated from $rowData
     */
    public function populateFields($rowData){
        
        ## Verify rowData is of correct length
        $length = 0;

        foreach($this->fields as $field){
            $length = $length+$field->getLength();
        }
        if($length == 0){
            throw new UnexistingFieldException("The row ".get_called_class()." to be populated contains no fields");
        }
        if(strlen($rowData) != $length){
            throw new \InvalidArgumentException("Invalid row data for this object.");
        }

        foreach($this->fields as $field){
            $value = substr($rowData,0,$field->getLength());
            $rowData = substr($rowData, $field->getLength());
            $field->setValue($value);
        }

        return $this;   
    }


    /**
     *  Populate one of the field
     */
    public function __set($name, $value)
    {
        $field = $this->getField($name);
        $field->setValue($value);
    }


    public function __get($name)
    {
        return $this->getField($name)->getValue();
    }


    /**
     *  Checks if the row' values are valid with the structure
     */
    public function isValid()
    {
        foreach($this->fields as $field)
        {
            if(!$field->isValid())
            {
                return false;
            }
        }

        return true;
    }


    /**
     *  Renders the row to a string, including the required lengths
     */
    public function __toString()
    {
        $string = '';

        foreach($this->fields as $name => $field)
        {
            $string .= $field->render();
        }

        return $string;
    }
}