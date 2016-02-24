<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * The most generic kind of creative work, including books, movies, photographs, software programs, etc.
 *
 * @see http://schema.org/CreativeWork Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
abstract class CreativeWork extends Thing {

    /**
     * @var Thing The subject matter of the content.
     */
    private $about;

    /**
     * @var AggregateRating The overall rating, based on a collection of reviews or ratings, of the item.
     */
    private $aggregateRating;

    /**
     * @var Person The author of this content. Please note that author is special in that HTML 5 provides a special mechanism for indicating authorship via the rel tag. That is equivalent to this and may be used interchangeably.
     */
    private $author;

    /**
     * @var Comment Comments, typically from users.
     */
    private $comment;

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
     * @var string The textual content of this CreativeWork.
     */
    private $text;

    /**
     * @var int The number of comments this CreativeWork (e.g. Article, Question or Answer) has received. This is most applicable to works published in Web sites with commenting system; additional comments may exist elsewhere.
     */
    private $commentCount;

    /**
     * Sets about.
     *
     * @param Thing $about
     *
     * @return $this
     */
    public function setAbout(Thing $about = NULL) {
        $this->about = $about;

        return $this;
    }

    /**
     * Gets about.
     *
     * @return Thing
     */
    public function getAbout() {
        return $this->about;
    }

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
     * Sets comment.
     *
     * @param Comment $comment
     *
     * @return $this
     */
    public function setComment(Comment $comment = NULL) {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Gets comment.
     *
     * @return Comment
     */
    public function getComment() {
        return $this->comment;
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

    /**
     * Sets headline.
     *
     * @param string $headline
     *
     * @return $this
     */
    public function setHeadline($headline) {
        $this->headline = $headline;

        return $this;
    }

    /**
     * Gets headline.
     *
     * @return string
     */
    public function getHeadline() {
        return $this->headline;
    }

    /**
     * Sets publisher.
     *
     * @param Organization $publisher
     *
     * @return $this
     */
    public function setPublisher(Organization $publisher = NULL) {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Gets publisher.
     *
     * @return Organization
     */
    public function getPublisher() {
        return $this->publisher;
    }

    /**
     * Sets text.
     *
     * @param string $text
     *
     * @return $this
     */
    public function setText($text) {
        $this->text = $text;

        return $this;
    }

    /**
     * Gets text.
     *
     * @return string
     */
    public function getText() {
        return $this->text;
    }

    /**
     * Sets commentCount.
     *
     * @param int $commentCount
     *
     * @return $this
     */
    public function setCommentCount($commentCount) {
        $this->commentCount = $commentCount;

        return $this;
    }

    /**
     * Gets commentCount.
     *
     * @return int
     */
    public function getCommentCount() {
        return $this->commentCount;
    }
}
