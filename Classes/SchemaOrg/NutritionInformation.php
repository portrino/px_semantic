<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Andre Wuttig <wuttig@portrino.de>, portrino GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * Nutritional information about the recipe.
 *
 * @see http://schema.org/NutritionInformation Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class NutritionInformation extends StructuredValue
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var Energy The number of calories
     */
    private $calories;

    /**
     * @var string The serving size, in terms of the number of volume or mass
     */
    private $servingSize;

    /**
     * @var Mass The number of grams of fat
     */
    private $fatContent;

    /**
     * Sets id.
     *
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets calories.
     *
     * @param Energy $calories
     *
     * @return $this
     */
    public function setCalories(Energy $calories = null)
    {
        $this->calories = $calories;

        return $this;
    }

    /**
     * Gets calories.
     *
     * @return Energy
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * Sets servingSize.
     *
     * @param string $servingSize
     *
     * @return $this
     */
    public function setServingSize($servingSize)
    {
        $this->servingSize = $servingSize;

        return $this;
    }

    /**
     * Gets servingSize.
     *
     * @return string
     */
    public function getServingSize()
    {
        return $this->servingSize;
    }

    /**
     * Sets fatContent.
     *
     * @param Mass $fatContent
     *
     * @return $this
     */
    public function setFatContent(Mass $fatContent = null)
    {
        $this->fatContent = $fatContent;

        return $this;
    }

    /**
     * Gets fatContent.
     *
     * @return Mass
     */
    public function getFatContent()
    {
        return $this->fatContent;
    }
}
