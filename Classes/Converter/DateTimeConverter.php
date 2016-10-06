<?php
namespace Portrino\PxSemantic\Converter;

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
 * Class DateTimeConverter
 *
 * @package Portrino\PxSemantic\Converter
 */
class DateTimeConverter implements TypoScriptTypeConverterInterface
{

    /**
     * The default date format is "YYYY-MM-DDT##:##:##+##:##", for example "2005-08-15T15:52:01+00:00"
     * according to the W3C standard @see http://www.w3.org/TR/NOTE-datetime.html
     *
     * @var string
     */
    const DEFAULT_DATE_FORMAT = \DateTime::W3C;

    /**
     * @param string $source
     *
     * @return \DateTime|null|\TYPO3\CMS\Extbase\Validation\Error
     * @throws \TYPO3\CMS\Extbase\Property\Exception\TypeConverterException
     */
    public function convert($source)
    {

        $dateFormat = self::DEFAULT_DATE_FORMAT;

        if (isset($source['value'])) {
            $dateAsString = $source['value'];
        }

        if (isset($source['format'])) {
            $dateFormat = $source['format'];
        }

        if ($dateAsString === '') {
            return null;
        }
        if (ctype_digit($dateAsString) && !isset($source['format']) && (!is_array($source) || !isset($source['dateFormat']))) {
            $dateFormat = 'U';
        }
        if (is_array($source) && isset($source['timezone']) && (string)$source['timezone'] !== '') {
            try {
                $timezone = new \DateTimeZone($source['timezone']);
            } catch (\Exception $e) {
                throw new \TYPO3\CMS\Extbase\Property\Exception\TypeConverterException('The specified timezone "' . $source['timezone'] . '" is invalid.',
                    1308240974);
            }
            $date = \DateTime::createFromFormat($dateFormat, $dateAsString, $timezone);
        } else {
            $date = \DateTime::createFromFormat($dateFormat, $dateAsString);
        }
        if ($date === false) {
            return new \TYPO3\CMS\Extbase\Validation\Error('The date "%s" was not recognized (for format "%s").',
                1307719788, [$dateAsString, $dateFormat]);
        }
        if (is_array($source)) {
            $this->overrideTimeIfSpecified($date, $source);
        }
        return $date;
    }

    /**
     * Overrides hour, minute & second of the given date with the values in the $source array
     *
     * @param \DateTime $date
     * @param array $source
     *
     * @return void
     */
    protected function overrideTimeIfSpecified(\DateTime $date, array $source)
    {
        if (!isset($source['hour']) && !isset($source['minute']) && !isset($source['second'])) {
            return;
        }
        $hour = isset($source['hour']) ? (int)$source['hour'] : 0;
        $minute = isset($source['minute']) ? (int)$source['minute'] : 0;
        $second = isset($source['second']) ? (int)$source['second'] : 0;
        $date->setTime($hour, $minute, $second);
    }

}