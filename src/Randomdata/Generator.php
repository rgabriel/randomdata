<?php
namespace Randomdata;

use Creator\CreatorsInterface;
use Formater\FormaterInterface;

class Generator
{
    const DEFAULT_LOCALE = 'en_US';
    const DEFAULT_FALLBACK_LOCALE = 'en_US';
    
    private $locale;
    private $fallbackLocale;
    
    private $creators;
    
    private $formators;
    
    public function __construct($locale = self::DEFAULT_LOCALE, $fallbackLocale = self::DEFAULT_FALLBACK_LOCALE)
    {
        // Testing for existence of locale!
        $this->locale = $locale;
        $this->fallbackLocale = $fallbackLocale;
    }
    
    public function getLocale()
    {
        return $this->locale;
    }
    
    public function getFallbackLocale()
    {
        return $this->fallbackLocale;
    }
    
    public function loadDefaultCreators()
    {
        $this->addCreator(new Creator\Name());
    }

    public function loadFormaters()
    {
        if (count($this->creators) == 0) {
            // No creators
            throw new \RuntimeException('No creators registered');
        }
        
        // Loop the creators to load the formators accordingly
        foreach ($this->creators as $creator) {
            
        }
    }
    
    public function addCreator(CreatorInterface $creator)
    {
        $this->creators[] = $creator;
    }
    
    public function addFormater(FormaterInterface $formater)
    {
        $this->formators[] = $formator;
    }
}