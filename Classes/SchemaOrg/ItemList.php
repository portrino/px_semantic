<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * A list of items of any sort—for example, Top 10 Movies About Weathermen, or Top 100 Party Songs. Not to be confused with HTML lists, which are often used only for formatting.
 *
 * @see http://schema.org/ItemList Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class ItemList extends Intangible {

    /**
     * @var int
     */
    private $id;

    /**
     * @var string For itemListElement values, you can use simple strings (e.g. "Peter", "Paul", "Mary"), existing entities, or use ListItem.
     *
     *             Text values are best if the elements in the list are plain strings. Existing entities are best for a simple, unordered list of existing things in your data. ListItem is used with ordered lists when you want to provide additional context about the element in that list or when the same item might be in different places in different lists.
     *
     *             Note: The order of elements in your mark-up is not sufficient for indicating the order or elements. Use ListItem with a 'position' property in such cases.
     */
    private $itemListElement;

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
     * Sets itemListElement.
     *
     * @param string $itemListElement
     *
     * @return $this
     */
    public function setItemListElement($itemListElement) {
        $this->itemListElement = $itemListElement;

        return $this;
    }

    /**
     * Gets itemListElement.
     *
     * @return string
     */
    public function getItemListElement() {
        return $this->itemListElement;
    }
}
