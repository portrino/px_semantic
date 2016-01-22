<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * The most generic kind of creative work, including books, movies, photographs, software programs, etc.
 *
 * @see http://schema.org/CreativeWork Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 *
 *
 * @package Portrino\PxSemantic\SchemaOrg
 */
class CreativeWork extends Thing {

    /**
     * @var AggregateRating The overall rating, based on a collection of reviews or ratings, of the item.
     */
    protected $aggregateRating;

    /**
     * @var Person The author of this content. Please note that author is special in that HTML 5 provides a special mechanism for indicating authorship via the rel tag. That is equivalent to this and may be used interchangeably.
     */
    protected $author;

    /**
     * @var \DateTime The date on which the CreativeWork was created or the item was added to a DataFeed.
     */
    protected $dateCreated;

    /**
     * @var \DateTime The date on which the CreativeWork was most recently modified or when the item's entry was modified within a DataFeed.
     */
    protected $dateModified;

    /**
     * @var \DateTime Date of first broadcast/publication.
     */
    protected $datePublished;

    /**
     * Sets aggregateRating.
     *
     * @param AggregateRating $aggregateRating
     *
     * @return $this
     */
    public function setAggregateRating(AggregateRating $aggregateRating = NULL) {
        $this->aggregateRating = $aggregateRating;

        return $this;
    }

    /**
     * Gets aggregateRating.
     *
     * @return AggregateRating
     */
    public function getAggregateRating() {
        return $this->aggregateRating;
    }

    /**
     * Sets author.
     *
     * @param Person $author
     *
     * @return $this
     */
    public function setAuthor(Person $author = NULL) {
        $this->author = $author;

        return $this;
    }

    /**
     * Gets author.
     *
     * @return Person
     */
    public function getAuthor() {
        return $this->author;
    }

    /**
     * Sets dateCreated.
     *
     * @param \DateTime $dateCreated
     *
     * @return $this
     */
    public function setDateCreated(\DateTime $dateCreated = NULL) {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Gets dateCreated.
     *
     * @return \DateTime
     */
    public function getDateCreated() {
        return $this->dateCreated;
    }

    /**
     * Sets dateModified.
     *
     * @param \DateTime $dateModified
     *
     * @return $this
     */
    public function setDateModified(\DateTime $dateModified = NULL) {
        $this->dateModified = $dateModified;

        return $this;
    }

    /**
     * Gets dateModified.
     *
     * @return \DateTime
     */
    public function getDateModified() {
        return $this->dateModified;
    }

    /**
     * Sets datePublished.
     *
     * @param \DateTime $datePublished
     *
     * @return $this
     */
    public function setDatePublished(\DateTime $datePublished = NULL) {
        $this->datePublished = $datePublished;

        return $this;
    }

    /**
     * Gets datePublished.
     *
     * @return \DateTime
     */
    public function getDatePublished() {
        return $this->datePublished;
    }
}
