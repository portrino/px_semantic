<?php
namespace Portrino\PxSemantic\Hydra\Collection;

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

use Portrino\PxSemantic\Hydra\Collection;

/**
 * Class PagedCollection
 *
 * @package Portrino\PxSemantic\Hydra\Collection
 */
class PagedCollection extends Collection
{

    /**
     * @var int
     */
    protected $itemsPerPage;

    /**
     * @var string
     */
    protected $firstPage;

    /**
     * @var string
     */
    protected $previousPage;

    /**
     * @var string
     */
    protected $nextPage;

    /**
     * @var string
     */
    protected $lastPage;

    /**
     * @return int
     */
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param int $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    /**
     * @return string
     */
    public function getFirstPage()
    {
        return $this->firstPage;
    }

    /**
     * @param string $firstPage
     */
    public function setFirstPage($firstPage)
    {
        $this->firstPage = $firstPage;
    }

    /**
     * @return string
     */
    public function getNextPage()
    {
        return $this->nextPage;
    }

    /**
     * @param string $nextPage
     */
    public function setNextPage($nextPage)
    {
        $this->nextPage = $nextPage;
    }

    /**
     * @return string
     */
    public function getPreviousPage()
    {
        return $this->previousPage;
    }

    /**
     * @param string $previousPage
     */
    public function setPreviousPage($previousPage)
    {
        $this->previousPage = $previousPage;
    }

    /**
     * @return string
     */
    public function getLastPage()
    {
        return $this->lastPage;
    }

    /**
     * @param string $lastPage
     */
    public function setLastPage($lastPage)
    {
        $this->lastPage = $lastPage;
    }

}