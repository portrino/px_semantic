<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * An image file.
 *
 * @see http://schema.org/ImageObject Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class ImageObject extends MediaObject {

    /**
     * @var int
     */
    private $id;

    /**
     * @var int The height of the item.
     */
    protected $height;

    /**
     * @var string URL of the item.
     */
    protected $url;

    /**
     * @var int The width of the item.
     */
    protected $width;

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
     * Sets height.
     *
     * @param int $height
     *
     * @return $this
     */
    public function setHeight($height) {
        $this->height = $height;

        return $this;
    }

    /**
     * Gets height.
     *
     * @return int
     */
    public function getHeight() {
        return $this->height;
    }

    /**
     * Sets url.
     *
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url) {
        $this->url = $url;

        return $this;
    }

    /**
     * Gets url.
     *
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * Sets width.
     *
     * @param int $width
     *
     * @return $this
     */
    public function setWidth($width) {
        $this->width = $width;

        return $this;
    }

    /**
     * Gets width.
     *
     * @return int
     */
    public function getWidth() {
        return $this->width;
    }
}
