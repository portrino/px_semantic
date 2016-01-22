<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * A recipe.
 *
 * @see http://schema.org/Recipe Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Recipe extends CreativeWork {

    /**
     * @var int
     */
    private $id;

    /**
     * @var string The time it takes to actually cook the dish, in [ISO 8601 duration format](http://en.wikipedia.org/wiki/ISO_8601).
     */
    protected $cookTime;

    /**
     * @var string A single ingredient used in the recipe, e.g. sugar, flour or garlic.
     */
    protected $recipeIngredient;

    /**
     * @var NutritionInformation Nutrition information about the recipe.
     */
    protected $nutrition;

    /**
     * @var string The length of time it takes to prepare the recipe, in [ISO 8601 duration format](http://en.wikipedia.org/wiki/ISO_8601).
     */
    protected $prepTime;

    /**
     * @var string A step or instruction involved in making the recipe.
     */
    protected $recipeInstructions;

    /**
     * @var string The quantity produced by the recipe (for example, number of people served, number of servings, etc).
     */
    protected $recipeYield;

    /**
     * @var string The total time it takes to prepare and cook the recipe, in [ISO 8601 duration format](http://en.wikipedia.org/wiki/ISO_8601).
     */
    protected $totalTime;

    /**
     * Sets id.
     *
     * @param int $id
     *
     * @return $this
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets id.
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Sets cookTime.
     *
     * @param string $cookTime
     *
     * @return $this
     */
    public function setCookTime($cookTime) {
        $this->cookTime = $cookTime;

        return $this;
    }

    /**
     * Gets cookTime.
     *
     * @return string
     */
    public function getCookTime() {
        return $this->cookTime;
    }

    /**
     * Sets recipeIngredient.
     *
     * @param string $recipeIngredient
     *
     * @return $this
     */
    public function setRecipeIngredient($recipeIngredient) {
        $this->recipeIngredient = $recipeIngredient;

        return $this;
    }

    /**
     * Gets recipeIngredient.
     *
     * @return string
     */
    public function getRecipeIngredient() {
        return $this->recipeIngredient;
    }

    /**
     * Sets nutrition.
     *
     * @param NutritionInformation $nutrition
     *
     * @return $this
     */
    public function setNutrition(NutritionInformation $nutrition = NULL) {
        $this->nutrition = $nutrition;

        return $this;
    }

    /**
     * Gets nutrition.
     *
     * @return NutritionInformation
     */
    public function getNutrition() {
        return $this->nutrition;
    }

    /**
     * Sets prepTime.
     *
     * @param string $prepTime
     *
     * @return $this
     */
    public function setPrepTime($prepTime) {
        $this->prepTime = $prepTime;

        return $this;
    }

    /**
     * Gets prepTime.
     *
     * @return string
     */
    public function getPrepTime() {
        return $this->prepTime;
    }

    /**
     * Sets recipeInstructions.
     *
     * @param string $recipeInstructions
     *
     * @return $this
     */
    public function setRecipeInstructions($recipeInstructions) {
        $this->recipeInstructions = $recipeInstructions;

        return $this;
    }

    /**
     * Gets recipeInstructions.
     *
     * @return string
     */
    public function getRecipeInstructions() {
        return $this->recipeInstructions;
    }

    /**
     * Sets recipeYield.
     *
     * @param string $recipeYield
     *
     * @return $this
     */
    public function setRecipeYield($recipeYield) {
        $this->recipeYield = $recipeYield;

        return $this;
    }

    /**
     * Gets recipeYield.
     *
     * @return string
     */
    public function getRecipeYield() {
        return $this->recipeYield;
    }

    /**
     * Sets totalTime.
     *
     * @param string $totalTime
     *
     * @return $this
     */
    public function setTotalTime($totalTime) {
        $this->totalTime = $totalTime;

        return $this;
    }

    /**
     * Gets totalTime.
     *
     * @return string
     */
    public function getTotalTime() {
        return $this->totalTime;
    }
}
