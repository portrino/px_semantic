<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * Quantity: Duration (use [ISO 8601 duration format](http://en.wikipedia.org/wiki/ISO_8601)).
 *
 * @see http://schema.org/Duration Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Duration extends Quantity {

    /**
     * @var int
     */
    private $id;

    /**
     * @var string The name of the item.
     */
    protected $name;

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
     * Sets name.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets name.
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }
}
