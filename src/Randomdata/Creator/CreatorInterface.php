<?php
namespace Randomdata\Creator;

interface CreatorInterface
{
    /**
     * To be implemented by each creator as a boolean return value if this uses
     * a formatter or not. If so, the formater gets injected over setFomatter
     * 
     * @return boolean
     */
    function usesFormatter();
}