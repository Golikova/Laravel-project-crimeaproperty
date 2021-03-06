<?php
namespace TYPO3\TYPO3CR\Migration\Filters;

/*
 * This file is part of the TYPO3.TYPO3CR package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\TYPO3CR\Domain\Model\NodeData;

/**
 * Filter removed nodes
 */
class IsRemoved implements FilterInterface
{
    /**
     * Returns TRUE if the given node is removed
     *
     * @param NodeData $node
     * @return boolean
     */
    public function matches(NodeData $node)
    {
        return $node->isRemoved();
    }
}
