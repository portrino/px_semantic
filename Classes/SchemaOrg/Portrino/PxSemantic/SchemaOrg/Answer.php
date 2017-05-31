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
 * An answer offered to a question; perhaps correct, perhaps opinionated or wrong.
 *
 * @see http://schema.org/Answer Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Answer extends Comment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int The number of downvotes this question, answer or comment has received from the community
     */
    private $downvoteCount;

    /**
     * @var Question The parent of a question, answer or item in general
     */
    private $parentItem;

    /**
     * @var int The number of upvotes this question, answer or comment has received from the community
     */
    private $upvoteCount;

    /**
     * Sets id.
     *
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets downvoteCount.
     *
     * @param int $downvoteCount
     *
     * @return $this
     */
    public function setDownvoteCount($downvoteCount)
    {
        $this->downvoteCount = $downvoteCount;

        return $this;
    }

    /**
     * Gets downvoteCount.
     *
     * @return int
     */
    public function getDownvoteCount()
    {
        return $this->downvoteCount;
    }

    /**
     * Sets parentItem.
     *
     * @param Question $parentItem
     *
     * @return $this
     */
    public function setParentItem(Question $parentItem = null)
    {
        $this->parentItem = $parentItem;

        return $this;
    }

    /**
     * Gets parentItem.
     *
     * @return Question
     */
    public function getParentItem()
    {
        return $this->parentItem;
    }

    /**
     * Sets upvoteCount.
     *
     * @param int $upvoteCount
     *
     * @return $this
     */
    public function setUpvoteCount($upvoteCount)
    {
        $this->upvoteCount = $upvoteCount;

        return $this;
    }

    /**
     * Gets upvoteCount.
     *
     * @return int
     */
    public function getUpvoteCount()
    {
        return $this->upvoteCount;
    }
}
