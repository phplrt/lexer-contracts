<?php
/**
 * This file is part of phplrt package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Phplrt\Contracts\Lexer;

/**
 * The lexical token that returns from LexerInterface
 */
interface TokenInterface
{
    /**
     * ID of the token that marks the end of the incoming data.
     *
     * @var int
     */
    public const TYPE_END_OF_INPUT = 0x00;

    /**
     * ID of a token that is anonymous (without ID) or should
     * be ignored by the parser.
     *
     * @var int
     */
    public const TYPE_SKIP = -0x01;

    /**
     * The token ID that was not defined.
     *
     * The lexer implementation allows an exception to be called
     * during analysis, instead of returning the token object with
     * this identifier.
     *
     * @var int
     */
    public const TYPE_UNKNOWN = -0x02;

    /**
     * Returns a token type if he is known.
     *
     * For example, to implement tokens of php "token_get_all()"
     * function:
     *
     * <code>
     *  >>> "<?php if (false) { return true; }"
     *
     *  --------------------------
     *    Type      | Value
     *  --------------------------
     *    379       | "<?php "
     *    327       | "if"
     *    382       | " "
     *    0         | "("
     *    319       | "false"
     *    0         | ")"
     *    382       | " "
     *    0         | "{"
     *    348       | "return"
     *    382       | " "
     *    319       | "true"
     *    0         | ";"
     *    382       | " "
     *    0         | "}"
     *  --------------------------
     * </code>
     *
     * @return int
     */
    public function getType(): int;

    /**
     * Token position in bytes
     *
     * @return int
     */
    public function getOffset(): int;

    /**
     * Returns the value of the captured subgroup
     *
     * @return string
     */
    public function getValue(): string;

    /**
     * The token value size in bytes
     *
     * @return int
     */
    public function getBytes(): int;

    /**
     * Returns a state id if the token is part of it.
     *
     * @return int|null
     */
    public function getState(): ?int;
}
