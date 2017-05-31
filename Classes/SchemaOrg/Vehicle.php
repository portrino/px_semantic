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
 * A vehicle is a device that is designed or used to transport people or cargo over land, water, air, or through space.
 *
 * @see http://schema.org/Vehicle Documentation on Schema.org
 *
 * @author Andre Wuttig<wuttig@portrino.de>
 */
class Vehicle extends Product
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var QuantitativeValue The available volume for cargo or luggage. For automobiles, this is usually the trunk volume.\\n\\nTypical unit code(s): LTR for liters, FTQ for cubic foot/feet\\n\\nNote: You can use \[\[minValue\]\] and \[\[maxValue\]\] to indicate ranges
     */
    private $cargoVolume;

    /**
     * @var \DateTime The date of the first registration of the vehicle with the respective public authorities
     */
    private $dateVehicleFirstRegistered;

    /**
     * @var string The drive wheel configuration, i.e. which roadwheels will receive torque from the vehicle's engine via the drivetrain
     */
    private $driveWheelConfiguration;

    /**
     * @var QuantitativeValue The amount of fuel consumed for traveling a particular distance or temporal duration with the given vehicle (e.g. liters per 100 km).\\n\\n\* Note 1: There are unfortunately no standard unit codes for liters per 100 km. Use \[\[unitText\]\] to indicate the unit of measurement, e.g. L/100 km.\\n\* Note 2: There are two ways of indicating the fuel consumption, \[\[fuelConsumption\]\] (e.g. 8 liters per 100 km) and \[\[fuelEfficiency\]\] (e.g. 30 miles per gallon). They are reciprocal.\\n\* Note 3: Often, the absolute value is useful only when related to driving speed ("at 80 km/h") or usage pattern ("city traffic"). You can use \[\[valueReference\]\] to link the value for the fuel consumption to another value
     */
    private $fuelConsumption;

    /**
     * @var QuantitativeValue The distance traveled per unit of fuel used; most commonly miles per gallon (mpg) or kilometers per liter (km/L).\\n\\n\* Note 1: There are unfortunately no standard unit codes for miles per gallon or kilometers per liter. Use \[\[unitText\]\] to indicate the unit of measurement, e.g. mpg or km/L.\\n\* Note 2: There are two ways of indicating the fuel consumption, \[\[fuelConsumption\]\] (e.g. 8 liters per 100 km) and \[\[fuelEfficiency\]\] (e.g. 30 miles per gallon). They are reciprocal.\\n\* Note 3: Often, the absolute value is useful only when related to driving speed ("at 80 km/h") or usage pattern ("city traffic"). You can use \[\[valueReference\]\] to link the value for the fuel economy to another value
     */
    private $fuelEfficiency;

    /**
     * @var string The type of fuel suitable for the engine or engines of the vehicle. If the vehicle has only one engine, this property can be attached directly to the vehicle
     */
    private $fuelType;

    /**
     * @var string A textual description of known damages, both repaired and unrepaired
     */
    private $knownVehicleDamages;

    /**
     * @var float The number or type of airbags in the vehicle
     */
    private $numberOfAirbags;

    /**
     * @var QuantitativeValue The number of axles.\\n\\nTypical unit code(s): C62
     */
    private $numberOfAxles;

    /**
     * @var QuantitativeValue The number of doors.\\n\\nTypical unit code(s): C62
     */
    private $numberOfDoors;

    /**
     * @var QuantitativeValue The total number of forward gears available for the transmission system of the vehicle.\\n\\nTypical unit code(s): C62
     */
    private $numberOfForwardGears;

    /**
     * @var QuantitativeValue The number of owners of the vehicle, including the current one.\\n\\nTypical unit code(s): C62
     */
    private $numberOfPreviousOwners;

    /**
     * @var \DateTime The date of production of the item, e.g. vehicle
     */
    private $productionDate;

    /**
     * @var \DateTime The date the item e.g. vehicle was purchased by the current owner
     */
    private $purchaseDate;

    /**
     * @var SteeringPositionValue The position of the steering wheel or similar device (mostly for cars)
     */
    private $steeringPosition;

    /**
     * @var string A short text indicating the configuration of the vehicle, e.g. '5dr hatchback ST 2.5 MT 225 hp' or 'limited edition'
     */
    private $vehicleConfiguration;

    /**
     * @var EngineSpecification Information about the engine or engines of the vehicle
     */
    private $vehicleEngine;

    /**
     * @var string The Vehicle Identification Number (VIN) is a unique serial number used by the automotive industry to identify individual motor vehicles
     */
    private $vehicleIdentificationNumber;

    /**
     * @var string The color or color combination of the interior of the vehicle
     */
    private $vehicleInteriorColor;

    /**
     * @var string The type or material of the interior of the vehicle (e.g. synthetic fabric, leather, wood, etc.). While most interior types are characterized by the material used, an interior type can also be based on vehicle usage or target audience
     */
    private $vehicleInteriorType;

    /**
     * @var \DateTime The release date of a vehicle model (often used to differentiate versions of the same make and model)
     */
    private $vehicleModelDate;

    /**
     * @var QuantitativeValue The number of passengers that can be seated in the vehicle, both in terms of the physical space available, and in terms of limitations set by law.\\n\\nTypical unit code(s): C62 for persons
     */
    private $vehicleSeatingCapacity;

    /**
     * @var string Indicates whether the vehicle has been used for special purposes, like commercial rental, driving school, or as a taxi. The legislation in many countries requires this information to be revealed when offering a car for sale
     */
    private $vehicleSpecialUsage;

    /**
     * @var string The type of component used for transmitting the power from a rotating power source to the wheels or other relevant component(s) ("gearbox" for cars)
     */
    private $vehicleTransmission;

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
     * Sets cargoVolume.
     *
     * @param QuantitativeValue $cargoVolume
     *
     * @return $this
     */
    public function setCargoVolume(QuantitativeValue $cargoVolume = null)
    {
        $this->cargoVolume = $cargoVolume;

        return $this;
    }

    /**
     * Gets cargoVolume.
     *
     * @return QuantitativeValue
     */
    public function getCargoVolume()
    {
        return $this->cargoVolume;
    }

    /**
     * Sets dateVehicleFirstRegistered.
     *
     * @param \DateTime $dateVehicleFirstRegistered
     *
     * @return $this
     */
    public function setDateVehicleFirstRegistered(\DateTime $dateVehicleFirstRegistered = null)
    {
        $this->dateVehicleFirstRegistered = $dateVehicleFirstRegistered;

        return $this;
    }

    /**
     * Gets dateVehicleFirstRegistered.
     *
     * @return \DateTime
     */
    public function getDateVehicleFirstRegistered()
    {
        return $this->dateVehicleFirstRegistered;
    }

    /**
     * Sets driveWheelConfiguration.
     *
     * @param string $driveWheelConfiguration
     *
     * @return $this
     */
    public function setDriveWheelConfiguration($driveWheelConfiguration)
    {
        $this->driveWheelConfiguration = $driveWheelConfiguration;

        return $this;
    }

    /**
     * Gets driveWheelConfiguration.
     *
     * @return string
     */
    public function getDriveWheelConfiguration()
    {
        return $this->driveWheelConfiguration;
    }

    /**
     * Sets fuelConsumption.
     *
     * @param QuantitativeValue $fuelConsumption
     *
     * @return $this
     */
    public function setFuelConsumption(QuantitativeValue $fuelConsumption = null)
    {
        $this->fuelConsumption = $fuelConsumption;

        return $this;
    }

    /**
     * Gets fuelConsumption.
     *
     * @return QuantitativeValue
     */
    public function getFuelConsumption()
    {
        return $this->fuelConsumption;
    }

    /**
     * Sets fuelEfficiency.
     *
     * @param QuantitativeValue $fuelEfficiency
     *
     * @return $this
     */
    public function setFuelEfficiency(QuantitativeValue $fuelEfficiency = null)
    {
        $this->fuelEfficiency = $fuelEfficiency;

        return $this;
    }

    /**
     * Gets fuelEfficiency.
     *
     * @return QuantitativeValue
     */
    public function getFuelEfficiency()
    {
        return $this->fuelEfficiency;
    }

    /**
     * Sets fuelType.
     *
     * @param string $fuelType
     *
     * @return $this
     */
    public function setFuelType($fuelType)
    {
        $this->fuelType = $fuelType;

        return $this;
    }

    /**
     * Gets fuelType.
     *
     * @return string
     */
    public function getFuelType()
    {
        return $this->fuelType;
    }

    /**
     * Sets knownVehicleDamages.
     *
     * @param string $knownVehicleDamages
     *
     * @return $this
     */
    public function setKnownVehicleDamages($knownVehicleDamages)
    {
        $this->knownVehicleDamages = $knownVehicleDamages;

        return $this;
    }

    /**
     * Gets knownVehicleDamages.
     *
     * @return string
     */
    public function getKnownVehicleDamages()
    {
        return $this->knownVehicleDamages;
    }

    /**
     * Sets numberOfAirbags.
     *
     * @param float $numberOfAirbags
     *
     * @return $this
     */
    public function setNumberOfAirbags($numberOfAirbags)
    {
        $this->numberOfAirbags = $numberOfAirbags;

        return $this;
    }

    /**
     * Gets numberOfAirbags.
     *
     * @return float
     */
    public function getNumberOfAirbags()
    {
        return $this->numberOfAirbags;
    }

    /**
     * Sets numberOfAxles.
     *
     * @param QuantitativeValue $numberOfAxles
     *
     * @return $this
     */
    public function setNumberOfAxles(QuantitativeValue $numberOfAxles = null)
    {
        $this->numberOfAxles = $numberOfAxles;

        return $this;
    }

    /**
     * Gets numberOfAxles.
     *
     * @return QuantitativeValue
     */
    public function getNumberOfAxles()
    {
        return $this->numberOfAxles;
    }

    /**
     * Sets numberOfDoors.
     *
     * @param QuantitativeValue $numberOfDoors
     *
     * @return $this
     */
    public function setNumberOfDoors(QuantitativeValue $numberOfDoors = null)
    {
        $this->numberOfDoors = $numberOfDoors;

        return $this;
    }

    /**
     * Gets numberOfDoors.
     *
     * @return QuantitativeValue
     */
    public function getNumberOfDoors()
    {
        return $this->numberOfDoors;
    }

    /**
     * Sets numberOfForwardGears.
     *
     * @param QuantitativeValue $numberOfForwardGears
     *
     * @return $this
     */
    public function setNumberOfForwardGears(QuantitativeValue $numberOfForwardGears = null)
    {
        $this->numberOfForwardGears = $numberOfForwardGears;

        return $this;
    }

    /**
     * Gets numberOfForwardGears.
     *
     * @return QuantitativeValue
     */
    public function getNumberOfForwardGears()
    {
        return $this->numberOfForwardGears;
    }

    /**
     * Sets numberOfPreviousOwners.
     *
     * @param QuantitativeValue $numberOfPreviousOwners
     *
     * @return $this
     */
    public function setNumberOfPreviousOwners(QuantitativeValue $numberOfPreviousOwners = null)
    {
        $this->numberOfPreviousOwners = $numberOfPreviousOwners;

        return $this;
    }

    /**
     * Gets numberOfPreviousOwners.
     *
     * @return QuantitativeValue
     */
    public function getNumberOfPreviousOwners()
    {
        return $this->numberOfPreviousOwners;
    }

    /**
     * Sets productionDate.
     *
     * @param \DateTime $productionDate
     *
     * @return $this
     */
    public function setProductionDate(\DateTime $productionDate = null)
    {
        $this->productionDate = $productionDate;

        return $this;
    }

    /**
     * Gets productionDate.
     *
     * @return \DateTime
     */
    public function getProductionDate()
    {
        return $this->productionDate;
    }

    /**
     * Sets purchaseDate.
     *
     * @param \DateTime $purchaseDate
     *
     * @return $this
     */
    public function setPurchaseDate(\DateTime $purchaseDate = null)
    {
        $this->purchaseDate = $purchaseDate;

        return $this;
    }

    /**
     * Gets purchaseDate.
     *
     * @return \DateTime
     */
    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }

    /**
     * Sets steeringPosition.
     *
     * @param SteeringPositionValue $steeringPosition
     *
     * @return $this
     */
    public function setSteeringPosition(SteeringPositionValue $steeringPosition = null)
    {
        $this->steeringPosition = $steeringPosition;

        return $this;
    }

    /**
     * Gets steeringPosition.
     *
     * @return SteeringPositionValue
     */
    public function getSteeringPosition()
    {
        return $this->steeringPosition;
    }

    /**
     * Sets vehicleConfiguration.
     *
     * @param string $vehicleConfiguration
     *
     * @return $this
     */
    public function setVehicleConfiguration($vehicleConfiguration)
    {
        $this->vehicleConfiguration = $vehicleConfiguration;

        return $this;
    }

    /**
     * Gets vehicleConfiguration.
     *
     * @return string
     */
    public function getVehicleConfiguration()
    {
        return $this->vehicleConfiguration;
    }

    /**
     * Sets vehicleEngine.
     *
     * @param EngineSpecification $vehicleEngine
     *
     * @return $this
     */
    public function setVehicleEngine(EngineSpecification $vehicleEngine = null)
    {
        $this->vehicleEngine = $vehicleEngine;

        return $this;
    }

    /**
     * Gets vehicleEngine.
     *
     * @return EngineSpecification
     */
    public function getVehicleEngine()
    {
        return $this->vehicleEngine;
    }

    /**
     * Sets vehicleIdentificationNumber.
     *
     * @param string $vehicleIdentificationNumber
     *
     * @return $this
     */
    public function setVehicleIdentificationNumber($vehicleIdentificationNumber)
    {
        $this->vehicleIdentificationNumber = $vehicleIdentificationNumber;

        return $this;
    }

    /**
     * Gets vehicleIdentificationNumber.
     *
     * @return string
     */
    public function getVehicleIdentificationNumber()
    {
        return $this->vehicleIdentificationNumber;
    }

    /**
     * Sets vehicleInteriorColor.
     *
     * @param string $vehicleInteriorColor
     *
     * @return $this
     */
    public function setVehicleInteriorColor($vehicleInteriorColor)
    {
        $this->vehicleInteriorColor = $vehicleInteriorColor;

        return $this;
    }

    /**
     * Gets vehicleInteriorColor.
     *
     * @return string
     */
    public function getVehicleInteriorColor()
    {
        return $this->vehicleInteriorColor;
    }

    /**
     * Sets vehicleInteriorType.
     *
     * @param string $vehicleInteriorType
     *
     * @return $this
     */
    public function setVehicleInteriorType($vehicleInteriorType)
    {
        $this->vehicleInteriorType = $vehicleInteriorType;

        return $this;
    }

    /**
     * Gets vehicleInteriorType.
     *
     * @return string
     */
    public function getVehicleInteriorType()
    {
        return $this->vehicleInteriorType;
    }

    /**
     * Sets vehicleModelDate.
     *
     * @param \DateTime $vehicleModelDate
     *
     * @return $this
     */
    public function setVehicleModelDate(\DateTime $vehicleModelDate = null)
    {
        $this->vehicleModelDate = $vehicleModelDate;

        return $this;
    }

    /**
     * Gets vehicleModelDate.
     *
     * @return \DateTime
     */
    public function getVehicleModelDate()
    {
        return $this->vehicleModelDate;
    }

    /**
     * Sets vehicleSeatingCapacity.
     *
     * @param QuantitativeValue $vehicleSeatingCapacity
     *
     * @return $this
     */
    public function setVehicleSeatingCapacity(QuantitativeValue $vehicleSeatingCapacity = null)
    {
        $this->vehicleSeatingCapacity = $vehicleSeatingCapacity;

        return $this;
    }

    /**
     * Gets vehicleSeatingCapacity.
     *
     * @return QuantitativeValue
     */
    public function getVehicleSeatingCapacity()
    {
        return $this->vehicleSeatingCapacity;
    }

    /**
     * Sets vehicleSpecialUsage.
     *
     * @param string $vehicleSpecialUsage
     *
     * @return $this
     */
    public function setVehicleSpecialUsage($vehicleSpecialUsage)
    {
        $this->vehicleSpecialUsage = $vehicleSpecialUsage;

        return $this;
    }

    /**
     * Gets vehicleSpecialUsage.
     *
     * @return string
     */
    public function getVehicleSpecialUsage()
    {
        return $this->vehicleSpecialUsage;
    }

    /**
     * Sets vehicleTransmission.
     *
     * @param string $vehicleTransmission
     *
     * @return $this
     */
    public function setVehicleTransmission($vehicleTransmission)
    {
        $this->vehicleTransmission = $vehicleTransmission;

        return $this;
    }

    /**
     * Gets vehicleTransmission.
     *
     * @return string
     */
    public function getVehicleTransmission()
    {
        return $this->vehicleTransmission;
    }
}
