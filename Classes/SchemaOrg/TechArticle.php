<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * A technical article - Example: How-to (task) topics, step-by-step, procedural troubleshooting, specifications, etc.
 *
 * @see http://schema.org/TechArticle Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class TechArticle extends Article {

    /**
     * @var int
     */
    private $id;

    /**
     * @var string Prerequisites needed to fulfill steps in article.
     */
    private $dependencies;

    /**
     * @var string Proficiency needed for this content; expected values: 'Beginner', 'Expert'.
     */
    private $proficiencyLevel;

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
     * Sets dependencies.
     *
     * @param string $dependencies
     *
     * @return $this
     */
    public function setDependencies($dependencies) {
        $this->dependencies = $dependencies;

        return $this;
    }

    /**
     * Gets dependencies.
     *
     * @return string
     */
    public function getDependencies() {
        return $this->dependencies;
    }

    /**
     * Sets proficiencyLevel.
     *
     * @param string $proficiencyLevel
     *
     * @return $this
     */
    public function setProficiencyLevel($proficiencyLevel) {
        $this->proficiencyLevel = $proficiencyLevel;

        return $this;
    }

    /**
     * Gets proficiencyLevel.
     *
     * @return string
     */
    public function getProficiencyLevel() {
        return $this->proficiencyLevel;
    }
}
