<?php
namespace TYPO3\Flow\Security\Exception;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * An "AccessDenied" Exception
 *
 * @api
 */
class AuthenticationRequiredException extends \TYPO3\Flow\Security\Exception {

	/**
	 * @var integer
	 */
	protected $statusCode = 401;

}

?>