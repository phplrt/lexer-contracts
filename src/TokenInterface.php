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
     * @var string
     */
    public const TYPE_END_OF_INPUT = 'T_EOI';

    /**
     * ID of a token that is anonymous (without ID) or should
     * be ignored by the parser.
     *
     * @var string
     */
    public const TYPE_SKIP = 'T_SKIP';

    /**
     * The token ID that was not defined.
     *
     * The lexer implementation allows an exception to be called
     * during analysis, instead of returning the token object with
     * this identifier.
     *
     * @var string
     */
    public const TYPE_UNKNOWN = 'T_UNKNOWN';

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
     *    Name          | Value
     *  --------------------------
     *    T_OPEN_TAG    | "<?php "
     *    T_IF          | "if"
     *    T_WHITESPACE  | " "
     *    T_SKIP        | "("
     *    T_STRING      | "false"
     *    T_SKIP        | ")"
     *    T_WHITESPACE  | " "
     *    T_SKIP        | "{"
     *    T_RETURN      | "return"
     *    T_WHITESPACE  | " "
     *    T_STRING      | "true"
     *    T_SKIP        | ";"
     *    T_WHITESPACE  | " "
     *    T_SKIP        | "}"
     *    T_EOI         | "\0"
     *  --------------------------
     * </code>
     *
     * @return string
     */
    public function getName(): string;

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
}
