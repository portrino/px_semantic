<?php

namespace Portrino\PxSemantic\SchemaOrg;

/**
 * An article, such as a news article or piece of investigative report. Newspapers and magazines have articles of many different types and this is intended to cover them all.
 *
 * See also [blog post](http://blog.schema.org/2014/09/schemaorg-support-for-bibliographic_2.html).
 *
 * @see http://schema.org/Article Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
abstract class Article extends CreativeWork {

    /**
     * @var string The actual body of the article.
     */
    private $articleBody;

    /**
     * @var string Articles may belong to one or more 'sections' in a magazine or newspaper, such as Sports, Lifestyle, etc.
     */
    private $articleSection;

    /**
     * @var int The number of words in the text of the Article.
     */
    private $wordCount;

    /**
     * @var string The page on which the work ends; for example "138" or "xvi".
     */
    private $pageEnd;

    /**
     * @var string The page on which the work starts; for example "135" or "xiii".
     */
    private $pageStart;

    /**
     * @var string Any description of pages that is not separated into pageStart and pageEnd; for example, "1-6, 9, 55" or "10-12, 46-49".
     */
    private $pagination;

    /**
     * Sets articleBody.
     *
     * @param string $articleBody
     *
     * @return $this
     */
    public function setArticleBody($articleBody) {
        $this->articleBody = $articleBody;

        return $this;
    }

    /**
     * Gets articleBody.
     *
     * @return string
     */
    public function getArticleBody() {
        return $this->articleBody;
    }

    /**
     * Sets articleSection.
     *
     * @param string $articleSection
     *
     * @return $this
     */
    public function setArticleSection($articleSection) {
        $this->articleSection = $articleSection;

        return $this;
    }

    /**
     * Gets articleSection.
     *
     * @return string
     */
    public function getArticleSection() {
        return $this->articleSection;
    }

    /**
     * Sets wordCount.
     *
     * @param int $wordCount
     *
     * @return $this
     */
    public function setWordCount($wordCount) {
        $this->wordCount = $wordCount;

        return $this;
    }

    /**
     * Gets wordCount.
     *
     * @return int
     */
    public function getWordCount() {
        return $this->wordCount;
    }

    /**
     * Sets pageEnd.
     *
     * @param string $pageEnd
     *
     * @return $this
     */
    public function setPageEnd($pageEnd) {
        $this->pageEnd = $pageEnd;

        return $this;
    }

    /**
     * Gets pageEnd.
     *
     * @return string
     */
    public function getPageEnd() {
        return $this->pageEnd;
    }

    /**
     * Sets pageStart.
     *
     * @param string $pageStart
     *
     * @return $this
     */
    public function setPageStart($pageStart) {
        $this->pageStart = $pageStart;

        return $this;
    }

    /**
     * Gets pageStart.
     *
     * @return string
     */
    public function getPageStart() {
        return $this->pageStart;
    }

    /**
     * Sets pagination.
     *
     * @param string $pagination
     *
     * @return $this
     */
    public function setPagination($pagination) {
        $this->pagination = $pagination;

        return $this;
    }

    /**
     * Gets pagination.
     *
     * @return string
     */
    public function getPagination() {
        return $this->pagination;
    }
}
