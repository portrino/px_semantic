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
 * A recipe. For dietary restrictions covered by the recipe, a few common restrictions are enumerated via [[suitableForDiet]]. The [[keywords]] property can also be used to add more detail.
 *
 * @see http://schema.org/Recipe Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Recipe extends CreativeWork
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string The total time it takes to prepare and cook the recipe, in [ISO 8601 duration format](http://en.wikipedia.org/wiki/ISO\_8601)
     */
    private $totalTime;

    /**
     * @var string The time it takes to actually cook the dish, in [ISO 8601 duration format](http://en.wikipedia.org/wiki/ISO\_8601)
     */
    private $cookTime;

    /**
     * @var NutritionInformation Nutrition information about the recipe
     */
    private $nutrition;

    /**
     * @var string The length of time it takes to prepare the recipe, in [ISO 8601 duration format](http://en.wikipedia.org/wiki/ISO\_8601)
     */
    private $prepTime;

    /**
     * @var string A single ingredient used in the recipe, e.g. sugar, flour or garlic
     */
    private $recipeIngredient;

    /**
     * @var string A step or instruction involved in making the recipe
     */
    private $recipeInstructions;

    /**
     * @var string The quantity produced by the recipe (for example, number of people served, number of servings, etc)
     */
    private $recipeYield;

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
     * Sets totalTime.
     *
     * @param string $totalTime
     *
     * @return $this
     */
    public function setTotalTime($totalTime)
    {
        $this->totalTime = $totalTime;

        return $this;
    }

    /**
     * Gets totalTime.
     *
     * @return string
     */
    public function getTotalTime()
    {
        return $this->totalTime;
    }

    /**
     * Sets cookTime.
     *
     * @param string $cookTime
     *
     * @return $this
     */
    public function setCookTime($cookTime)
    {
        $this->cookTime = $cookTime;

        return $this;
    }

    /**
     * Gets cookTime.
     *
     * @return string
     */
    public function getCookTime()
    {
        return $this->cookTime;
    }

    /**
     * Sets nutrition.
     *
     * @param NutritionInformation $nutrition
     *
     * @return $this
     */
    public function setNutrition(NutritionInformation $nutrition = null)
    {
        $this->nutrition = $nutrition;

        return $this;
    }

    /**
     * Gets nutrition.
     *
     * @return NutritionInformation
     */
    public function getNutrition()
    {
        return $this->nutrition;
    }

    /**
     * Sets prepTime.
     *
     * @param string $prepTime
     *
     * @return $this
     */
    public function setPrepTime($prepTime)
    {
        $this->prepTime = $prepTime;

        return $this;
    }

    /**
     * Gets prepTime.
     *
     * @return string
     */
    public function getPrepTime()
    {
        return $this->prepTime;
    }

    /**
     * Sets recipeIngredient.
     *
     * @param string $recipeIngredient
     *
     * @return $this
     */
    public function setRecipeIngredient($recipeIngredient)
    {
        $this->recipeIngredient = $recipeIngredient;

        return $this;
    }

    /**
     * Gets recipeIngredient.
     *
     * @return string
     */
    public function getRecipeIngredient()
    {
        return $this->recipeIngredient;
    }

    /**
     * Sets recipeInstructions.
     *
     * @param string $recipeInstructions
     *
     * @return $this
     */
    public function setRecipeInstructions($recipeInstructions)
    {
        $this->recipeInstructions = $recipeInstructions;

        return $this;
    }

    /**
     * Gets recipeInstructions.
     *
     * @return string
     */
    public function getRecipeInstructions()
    {
        return $this->recipeInstructions;
    }

    /**
     * Sets recipeYield.
     *
     * @param string $recipeYield
     *
     * @return $this
     */
    public function setRecipeYield($recipeYield)
    {
        $this->recipeYield = $recipeYield;

        return $this;
    }

    /**
     * Gets recipeYield.
     *
     * @return string
     */
    public function getRecipeYield()
    {
        return $this->recipeYield;
    }
}
