<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * A specific question - e.g. from a user seeking answers online, or collected in a Frequently Asked Questions (FAQ) document.
 *
 * @see http://schema.org/Question Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Question extends CreativeWork {

    /**
     * @var int
     */
    private $id;

    /**
     * @var int The number of upvotes this question, answer or comment has received from the community.
     */
    private $upvoteCount;

    /**
     * @var int The number of downvotes this question, answer or comment has received from the community.
     */
    private $downvoteCount;

    /**
     * @var int The number of answers this question has received.
     */
    private $answerCount;

    /**
     * @var Answer The answer that has been accepted as best, typically on a Question/Answer site. Sites vary in their selection mechanisms, e.g. drawing on community opinion and/or the view of the Question author.
     */
    private $acceptedAnswer;

    /**
     * @var Answer An answer (possibly one of several, possibly incorrect) to a Question, e.g. on a Question/Answer site.
     */
    private $suggestedAnswer;

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
     * Sets answerCount.
     *
     * @param int $answerCount
     *
     * @return $this
     */
    public function setAnswerCount($answerCount) {
        $this->answerCount = $answerCount;

        return $this;
    }

    /**
     * Gets answerCount.
     *
     * @return int
     */
    public function getAnswerCount() {
        return $this->answerCount;
    }

    /**
     * Sets acceptedAnswer.
     *
     * @param Answer $acceptedAnswer
     *
     * @return $this
     */
    public function setAcceptedAnswer(Answer $acceptedAnswer = NULL) {
        $this->acceptedAnswer = $acceptedAnswer;

        return $this;
    }

    /**
     * Gets acceptedAnswer.
     *
     * @return Answer
     */
    public function getAcceptedAnswer() {
        return $this->acceptedAnswer;
    }

    /**
     * Sets suggestedAnswer.
     *
     * @param Answer $suggestedAnswer
     *
     * @return $this
     */
    public function setSuggestedAnswer(Answer $suggestedAnswer = NULL) {
        $this->suggestedAnswer = $suggestedAnswer;

        return $this;
    }

    /**
     * Gets suggestedAnswer.
     *
     * @return Answer
     */
    public function getSuggestedAnswer() {
        return $this->suggestedAnswer;
    }
}
