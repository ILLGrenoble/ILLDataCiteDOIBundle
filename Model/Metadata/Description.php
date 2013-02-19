<?php
/*
* This file is part of the ILLDataCiteDOIBundle package.
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*
* @License  MIT License
*/

namespace ILL\DataCiteDOIBundle\Model\Metadata;

/**
 * A name or title by which a resource is known.
 * Please see http://schema.datacite.org/meta/kernel-2.0/metadata.xsd for more detail.
 */
class Description
{
    private $description;
    private $type;

    /**
     * Please see http://schema.datacite.org/meta/kernel-2.1/include/datacite-descriptionType-v1.1.xsd for valid
     * description types
     */
    private static $TYPES = array("Abstract", "TableOfContents", "Other");

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setType($type)
    {
        if (in_array($type, self::TYPES)) {
            $this->type = $type;

            return $this;
        } else {
            throw new \InvalidArgumentException(sprintf("Not a valid type. Valid types are: %s", json_encode(self::TYPES)));
        }
    }

    public function getType()
    {
        return $this->type;
    }
}
