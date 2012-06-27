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
    
    private $formatters;
    
    private $randomizer;
    
    public function __construct(
            $locale = self::DEFAULT_LOCALE,
            $fallbackLocale = self::DEFAULT_FALLBACK_LOCALE,
            RandomizerInterface $randomizer = null)
    {
        // @TODO Testing for existence of locales
        $this->locale = $locale;
        $this->fallbackLocale = $fallbackLocale;
        
        // Randomizer fallback
        if (is_null($randomizer)) {
            $randomizer = new Randomizer();
        }
        
        $this->randomizer = $randomizer;
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
        $this->addCreator($this->loadCreator('Name'));
    }
    
    protected function loadCreator($name)
    {
        $creatorClassName = 'Creator\\' . $name;
        
        $creator = new $creatorClassName($this->randomizer);
        
        // See if they need a formatter
        if ($creator->usesFormatter()) {
            // find the formatter and load it
            $formatter = '';
            $creator->setFormatter($formatter);
        }
    }
    
    public function addCreator(CreatorInterface $creator)
    {
        $this->creators[] = $creator;
    }
    
    public function addFormatter(FormatterInterface $formatter)
    {
        $this->formatters[] = $formatter;
    }
}