<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Core\Authentication\Token;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * TokenInterface is the interface for the user authentication information.
 *
 * @method string getUserIdentifier() returns the user identifier used during authentication (e.g. a user's e-mailaddress or username)
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
interface TokenInterface extends \Serializable
{
    /**
     * Returns a string representation of the Token.
     *
     * This is only to be used for debugging purposes.
     *
     * @return string
     */
    public function __toString();

    /**
     * Returns the user roles.
     *
     * @return string[]
     */
    public function getRoleNames(): array;

    /**
     * Returns the user credentials.
     *
     * @return mixed
     *
     * @deprecated since 5.4
     */
    public function getCredentials();

    /**
     * Returns a user representation.
     *
     * @return UserInterface
     *
     * @see AbstractToken::setUser()
     */
    public function getUser();

    /**
     * Sets the authenticated user in the token.
     *
     * @param UserInterface $user
     *
     * @throws \InvalidArgumentException
     */
    public function setUser($user);

    /**
     * Returns whether the user is authenticated or not.
     *
     * @return bool true if the token has been authenticated, false otherwise
     *
     * @deprecated since Symfony 5.4. In 6.0, security tokens will always be considered authenticated
     */
    public function isAuthenticated();

    /**
     * Sets the authenticated flag.
     *
     * @deprecated since Symfony 5.4. In 6.0, security tokens will always be considered authenticated
     */
    public function setAuthenticated(bool $isAuthenticated);

    /**
     * Removes sensitive information from the token.
     */
    public function eraseCredentials();

    /**
     * Returns the token attributes.
     *
     * @return array
     */
    public function getAttributes();

    /**
     * Sets the token attributes.
     *
     * @param array $attributes The token attributes
     */
    public function setAttributes(array $attributes);

    /**
     * Returns true if the attribute exists.
     *
     * @return bool
     */
    public function hasAttribute(string $name);

    /**
     * Returns an attribute value.
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException When attribute doesn't exist for this token
     */
    public function getAttribute(string $name);

    /**
     * Sets an attribute.
     *
     * @param mixed $value The attribute value
     */
    public function setAttribute(string $name, $value);

    /**
     * Returns all the necessary state of the object for serialization purposes.
     */
    public function __serialize(): array;

    /**
     * Restores the object state from an array given by __serialize().
     */
    public function __unserialize(array $data): void;

    /**
     * @return string
     *
     * @deprecated since Symfony 5.3, use getUserIdentifier() instead
     */
    public function getUsername();
}
