<?php
namespace TYPO3\Media\Domain\Strategy;

/*
 * This file is part of the TYPO3.Media package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Resource\Resource;
use TYPO3\Flow\Utility\MediaTypes;
use TYPO3\Flow\Utility\PositionalArraySorter;

/**
 * A mapping strategy based on configured expressions.
 *
 * @Flow\Scope("singleton")
 */
class ConfigurationAssetModelMappingStrategy implements AssetModelMappingStrategyInterface
{
    /**
     * @Flow\InjectConfiguration(package="TYPO3.Media", path="asset.modelMappingStrategy")
     * @var array
     */
    protected $settings;

    /**
     *
     */
    public function initializeObject()
    {
        $strategyConfigurationSorter = new PositionalArraySorter($this->settings['patterns']);
        $this->settings['patterns'] = $strategyConfigurationSorter->toArray();
    }

    /**
     * Map the given resource to a media model class.
     *
     * @param Resource $resource
     * @param array $additionalProperties Optional properties that can be taken into account for deciding the model class. what you get here can depend on the caller, so you should always fallback to something based on the resource.
     * @return string
     */
    public function map(Resource $resource, array $additionalProperties = array())
    {
        $mediaType = MediaTypes::getMediaTypeFromFilename($resource->getFilename());
        foreach ($this->settings['patterns'] as $pattern => $mappingInformation) {
            if (preg_match($pattern, $mediaType)) {
                return $mappingInformation['className'];
            }
        }

        return $this->settings['default'];
    }
}
