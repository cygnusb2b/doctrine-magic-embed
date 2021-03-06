<?php
namespace Cygnus\DoctrineMagicEmbedBundle\Mapping\Driver;

use Cygnus\DoctrineMagicEmbedBundle\Mapping\ClassMetadata;
use Cygnus\DoctrineMagicEmbedBundle\Mapping\Annotations as MagicEmbed;
use Doctrine\Common\Annotations\Reader;

/**
 * The AnnotationDriver reads the mapping metadata from docblock annotations.
 *
 */
class AnnotationDriver
{

    /**
     * The AnnotationReader.
     *
     * @var AnnotationReader
     */
    protected $reader;

    /**
     * Initializes a new AnnotationDriver that uses the given AnnotationReader for reading annotations
     *
     * @param Reader $reader The AnnotationReader to use
     */
    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }

    /**
     * Loads the metadata for the specified class into the provided container.
     *
     * @param string        $className
     * @param ClassMetadata $metadata
     *
     * @return void
     */
    public function loadMetadataForClass($className, ClassMetadata $metadata) 
    {
        $reflClass = $metadata->getReflectionClass();
        
        // Handle class annotations
        $classAnnotations = $this->reader->getClassAnnotations($reflClass);
        foreach ($classAnnotations as $annotation) {

        }

        // Handle property annotations
        foreach ($reflClass->getProperties() as $property) {
            $propertyAnnotations = $this->reader->getPropertyAnnotations($property);

            $mapping = array('fieldName' => $property->getName());

            foreach ($propertyAnnotations as $annotation) {
                if ($annotation instanceof MagicEmbed\Expose) {
                    $mapping = array_replace($mapping, (array) $annotation);

                    $metadata->setExposedField($mapping);
                }
            }
        }

        // Handle method annotations
        
        return $metadata;
    }

    /**
     * Gets the names of all mapped classes known to this driver.
     *
     * @return array The names of all mapped classes known to this driver.
     */
    public function getAllClassNames() 
    {

    }
}
