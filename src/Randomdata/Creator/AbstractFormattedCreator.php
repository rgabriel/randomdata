<?php
namespace Randomdata\Creator;

use Randomdata\Formatter\FormatterInterface;

abstract class AbstractFormattedCreator extends AbstractCreator implements FormattedCreatorInterface
{
    protected $formatter;
    
    public function usesFormatter()
    {
        return true;
    }
    
    public function setFormatter(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
        
        return $this;
    }
    
    public function getFormatter()
    {
        return $this->formatter;
    }
}