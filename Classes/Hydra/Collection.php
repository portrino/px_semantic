<?php
namespace Portrino\PxSemantic\Hydra;

use Portrino\PxSemantic\Entity\EntityInterface;

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

/**
 * Class Collection
 *
 * @package Portrino\PxSemantic\Hydra
 */
class Collection implements EntityInterface
{

    /**
     * @var string
     */
    protected $context = 'http://www.w3.org/ns/hydra/context.jsonld';

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $type = 'Collection';

    /**
     * @var int
     */
    protected $totalItems = 0;

    /**
     * @var array
     */
    protected $member = [];

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param string $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @param int $totalItems
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
    }

    /**
     * @return array
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * @param array $member
     */
    public function setMember($member)
    {
        $this->member = $member;
    }

    /**
     * @param $memberItem
     */
    public function addMember($memberItem)
    {
        $this->member[] = $memberItem;
    }

}