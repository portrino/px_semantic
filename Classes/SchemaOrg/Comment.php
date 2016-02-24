<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * A comment on an item - for example, a comment on a blog post. The comment's content is expressed via the "text" property, and its topic via "about", properties shared with all CreativeWorks.
 *
 * @see http://schema.org/Comment Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
abstract class Comment extends CreativeWork {

    /**
     * @var int The number of upvotes this question, answer or comment has received from the community.
     */
    private $upvoteCount;

    /**
     * @var int The number of downvotes this question, answer or comment has received from the community.
     */
    private $downvoteCount;

    /**
     * @var Question The parent of a question, answer or item in general.
     */
    private $parentItem;

    /**
     * Sets upvoteCount.
     *
     * @param int $upvoteCount
     *
     * @return $this
     */
    public function setUpvoteCount($upvoteCount) {
        $this->upvoteCount = $upvoteCount;

        return $this;
    }

    /**
     * Gets upvoteCount.
     *
     * @return int
     */
    public function getUpvoteCount() {
        return $this->upvoteCount;
    }

    /**
     * Sets downvoteCount.
     *
     * @param int $downvoteCount
     *
     * @return $this
     */
    public function setDownvoteCount($downvoteCount) {
        $this->downvoteCount = $downvoteCount;

        return $this;
    }

    /**
     * Gets downvoteCount.
     *
     * @return int
     */
    public function getDownvoteCount() {
        return $this->downvoteCount;
    }

    /**
     * Sets parentItem.
     *
     * @param Question $parentItem
     *
     * @return $this
     */
    public function setParentItem(Question $parentItem = NULL) {
        $this->parentItem = $parentItem;

        return $this;
    }

    /**
     * Gets parentItem.
     *
     * @return Question
     */
    public function getParentItem() {
        return $this->parentItem;
    }
}
