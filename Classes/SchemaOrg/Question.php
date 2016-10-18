<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Andre Wuttig <wuttig@portrino.de>, portrino GmbH
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
 * A specific question - e.g. from a user seeking answers online, or collected in a Frequently Asked Questions (FAQ) document.
 *
 * @see http://schema.org/Question Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Question extends CreativeWork
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int The number of upvotes this question, answer or comment has received from the community
     */
    protected $upvoteCount;

    /**
     * @var int The number of downvotes this question, answer or comment has received from the community
     */
    protected $downvoteCount;

    /**
     * @var int The number of answers this question has received
     */
    protected $answerCount;

    /**
     * @var Answer The answer that has been accepted as best, typically on a Question/Answer site. Sites vary in their selection mechanisms, e.g. drawing on community opinion and/or the view of the Question author
     */
    protected $acceptedAnswer;

    /**
     * @var Answer An answer (possibly one of several, possibly incorrect) to a Question, e.g. on a Question/Answer site
     */
    protected $suggestedAnswer;

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
     * Sets answerCount.
     *
     * @param int $answerCount
     *
     * @return $this
     */
    public function setAnswerCount($answerCount)
    {
        $this->answerCount = $answerCount;

        return $this;
    }

    /**
     * Gets answerCount.
     *
     * @return int
     */
    public function getAnswerCount()
    {
        return $this->answerCount;
    }

    /**
     * Sets acceptedAnswer.
     *
     * @param Answer $acceptedAnswer
     *
     * @return $this
     */
    public function setAcceptedAnswer(Answer $acceptedAnswer = null)
    {
        $this->acceptedAnswer = $acceptedAnswer;

        return $this;
    }

    /**
     * Gets acceptedAnswer.
     *
     * @return Answer
     */
    public function getAcceptedAnswer()
    {
        return $this->acceptedAnswer;
    }

    /**
     * Sets suggestedAnswer.
     *
     * @param Answer $suggestedAnswer
     *
     * @return $this
     */
    public function setSuggestedAnswer(Answer $suggestedAnswer = null)
    {
        $this->suggestedAnswer = $suggestedAnswer;

        return $this;
    }

    /**
     * Gets suggestedAnswer.
     *
     * @return Answer
     */
    public function getSuggestedAnswer()
    {
        return $this->suggestedAnswer;
    }
}
