<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * The most generic kind of creative work, including books, movies, photographs, software programs, etc.
 *
 * @see http://schema.org/CreativeWork Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
abstract class CreativeWork extends Thing
{
    /**
     * @var AggregateRating The overall rating, based on a collection of reviews or ratings, of the item.
     */
    private $aggregateRating;
    /**
     * @var Person The author of this content. Please note that author is special in that HTML 5 provides a special mechanism for indicating authorship via the rel tag. That is equivalent to this and may be used interchangeably.
     */
    private $author;
    /**
     * @var \DateTime The date on which the CreativeWork was created or the item was added to a DataFeed.
     */
    private $dateCreated;
    /**
     * @var \DateTime The date on which the CreativeWork was most recently modified or when the item's entry was modified within a DataFeed.
     */
    private $dateModified;
    /**
     * @var \DateTime Date of first broadcast/publication.
     */
    private $datePublished;
    /**
     * @var string Headline of the article.
     */
    private $headline;
    /**
     * @var Organization The publisher of the creative work.
     */
    private $publisher;

    /**
     * Sets aggregateRating.
     *
     * @param AggregateRating $aggregateRating
     *
     * @return $this
     */
    public function setAggregateRating(AggregateRating $aggregateRating = null)
    {
        $this->aggregateRating = $aggregateRating;

        return $this;
    }

    /**
     * Gets aggregateRating.
     *
     * @return AggregateRating
     */
    public function getAggregateRating()
    {
        return $this->aggregateRating;
    }

    /**
     * Sets author.
     *
     * @param Person $author
     *
     * @return $this
     */
    public function setAuthor(Person $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Gets author.
     *
     * @return Person
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets dateCreated.
     *
     * @param \DateTime $dateCreated
     *
     * @return $this
     */
    public function setDateCreated(\DateTime $dateCreated = null)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Gets dateCreated.
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Sets dateModified.
     *
     * @param \DateTime $dateModified
     *
     * @return $this
     */
    public function setDateModified(\DateTime $dateModified = null)
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    /**
     * Gets dateModified.
     *
     * @return \DateTime
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * Sets datePublished.
     *
     * @param \DateTime $datePublished
     *
     * @return $this
     */
    public function setDatePublished(\DateTime $datePublished = null)
    {
        $this->datePublished = $datePublished;

        return $this;
    }

    /**
     * Gets datePublished.
     *
     * @return \DateTime
     */
    public function getDatePublished()
    {
        return $this->datePublished;
    }

    /**
     * Sets headline.
     *
     * @param string $headline
     *
     * @return $this
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;

        return $this;
    }

    /**
     * Gets headline.
     *
     * @return string
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * Sets publisher.
     *
     * @param Organization $publisher
     *
     * @return $this
     */
    public function setPublisher(Organization $publisher = null)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Gets publisher.
     *
     * @return Organization
     */
    public function getPublisher()
    {
        return $this->publisher;
    }
}
