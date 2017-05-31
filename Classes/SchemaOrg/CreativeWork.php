<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Andre Wuttig <wuttig@portrino.de>, portrino GmbH
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
 * The most generic kind of creative work, including books, movies, photographs, software programs, etc.
 *
 * @see http://schema.org/CreativeWork Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class CreativeWork extends Thing
{
    /**
     * @var Thing The subject matter of the content
     */
    private $about;

    /**
     * @var Person The author of this content or rating. Please note that author is special in that HTML 5 provides a special mechanism for indicating authorship via the rel tag. That is equivalent to this and may be used interchangeably
     */
    private $author;

    /**
     * @var AggregateRating The overall rating, based on a collection of reviews or ratings, of the item
     */
    private $aggregateRating;

    /**
     * @var Comment Comments, typically from users
     */
    private $comment;

    /**
     * @var int The number of comments this CreativeWork (e.g. Article, Question or Answer) has received. This is most applicable to works published in Web sites with commenting system; additional comments may exist elsewhere
     */
    private $commentCount;

    /**
     * @var \DateTime The date on which the CreativeWork was created or the item was added to a DataFeed
     */
    private $dateCreated;

    /**
     * @var \DateTime Date of first broadcast/publication
     */
    private $datePublished;

    /**
     * @var \DateTime The date on which the CreativeWork was most recently modified or when the item's entry was modified within a DataFeed
     */
    private $dateModified;

    /**
     * @var string Headline of the article
     */
    private $headline;

    /**
     * @var Organization The publisher of the creative work
     */
    private $publisher;

    /**
     * @var string The textual content of this CreativeWork
     */
    private $text;

    /**
     * Sets about.
     *
     * @param Thing $about
     *
     * @return $this
     */
    public function setAbout(Thing $about = null)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Gets about.
     *
     * @return Thing
     */
    public function getAbout()
    {
        return $this->about;
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
     * Sets comment.
     *
     * @param Comment $comment
     *
     * @return $this
     */
    public function setComment(Comment $comment = null)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Gets comment.
     *
     * @return Comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Sets commentCount.
     *
     * @param int $commentCount
     *
     * @return $this
     */
    public function setCommentCount($commentCount)
    {
        $this->commentCount = $commentCount;

        return $this;
    }

    /**
     * Gets commentCount.
     *
     * @return int
     */
    public function getCommentCount()
    {
        return $this->commentCount;
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

    /**
     * Sets text.
     *
     * @param string $text
     *
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Gets text.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}
