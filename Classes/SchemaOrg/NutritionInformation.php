<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * Nutritional information about the recipe.
 *
 * @see http://schema.org/NutritionInformation Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class NutritionInformation extends StructuredValue {

    /**
     * @var int
     */
    private $id;

    /**
     * @var Energy The number of calories.
     */
    protected $calories;

    /**
     * @var Mass The number of grams of fat.
     */
    protected $fatContent;

    /**
     * @var string The serving size, in terms of the number of volume or mass.
     */
    protected $servingSize;

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
     * Sets calories.
     *
     * @param Energy $calories
     *
     * @return $this
     */
    public function setCalories(Energy $calories = NULL) {
        $this->calories = $calories;

        return $this;
    }

    /**
     * Gets calories.
     *
     * @return Energy
     */
    public function getCalories() {
        return $this->calories;
    }

    /**
     * Sets fatContent.
     *
     * @param Mass $fatContent
     *
     * @return $this
     */
    public function setFatContent(Mass $fatContent = NULL) {
        $this->fatContent = $fatContent;

        return $this;
    }

    /**
     * Gets fatContent.
     *
     * @return Mass
     */
    public function getFatContent() {
        return $this->fatContent;
    }

    /**
     * Sets servingSize.
     *
     * @param string $servingSize
     *
     * @return $this
     */
    public function setServingSize($servingSize) {
        $this->servingSize = $servingSize;

        return $this;
    }

    /**
     * Gets servingSize.
     *
     * @return string
     */
    public function getServingSize() {
        return $this->servingSize;
    }
}
