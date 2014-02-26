<?php
namespace Cygnus\DoctrineMagicEmbedBundle\Mapping\Driver;

use Doctrine\Common\Persistence\Mapping\ClassMetadata;
use Doctrine\Common\Persistence\Mapping\Driver\AnnotationDriver as AbstractAnnotationDriver;

use Cygnus\DoctrineMagicEmbedBundle\Mapping\Annotations as MagicEmbed;

/**
 * The AnnotationDriver reads the mapping metadata from docblock annotations.
 *
 */
class AnnotationDriver extends AbstractAnnotationDriver
{
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

    }

    /**
     * Gets the names of all mapped classes known to this driver.
     *
     * @return array The names of all mapped classes known to this driver.
     */
    public function getAllClassNames() 
    {

    }

    /**
     * Returns whether the class with the specified name should have its metadata loaded.
     * This is only the case if it is either mapped as an Entity or a MappedSuperclass.
     *
     * @param string $className
     *
     * @return boolean
     */
    public function isTransient($className)
    {

    }
}