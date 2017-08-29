<?php
namespace Portrino\PxSemantic\Domain\Repository;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 André Wuttig <wuttig@portrino.de>, portrino GmbH
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
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class PageRepository
 *
 * @package Portrino\PxSemantic\Domain\Repository
 */
class PageRepository extends Repository implements RestRepositoryInterface
{

    /**
     * @var array $defaultOrderings
     */
    protected $defaultOrderings = [
        'sorting' => QueryInterface::ORDER_ASCENDING
    ];

    /**
     * Returns all objects of this repository limited by offset and limit and constraint
     *
     * @param int $offset
     * @param int $limit
     * @param array $constraints
     *
     * @return QueryResultInterface|array
     */
    public function findByOffsetAndLimitAndConstraints($offset = 0, $limit = -1, $constraints = [])
    {
        $query = $this->createQuery();

        if ($offset > 0) {
            $query->setOffset($offset);
        }

        if ($limit > -1) {
            $query->setLimit($limit);
        }

        return $query->execute();
    }

    /**
     * Count by constraint
     *
     * @param array $constraints
     *
     * @return int
     */
    public function countByConstraints($constraints = [])
    {
        // we call countAll here, because we have no specific contraints
        return parent::countAll();
    }


}
