<?php
/**
 * This file is part of phplrt package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Phplrt\Contracts\Lexer;

use Phplrt\Contracts\Source\ReadableInterface;
use Phplrt\Contracts\Lexer\Exception\LexerExceptionInterface;
use Phplrt\Contracts\Lexer\Exception\RuntimeExceptionInterface;

/**
 * An interface that is an abstract implementation of a lexer.
 *
 * An implementation should be a lexical analyser, i.e. split a string into
 * a set of lexeme (tokens).
 */
interface LexerInterface
{
    /**
     * Returns a set of token objects from the passed source.
     *
     * For example, to implement "token_get_all()" function:
     *
     * <code>
     *  $source = new Readable('<?php if (false) { return true; }');
     *  $lexer  = new PhpLexer();
     *
     *  foreach ($lexer->lex($source) as $token) {
     *      echo vsprintf('%5s | %10s | "%s"' . "\n", [
     *          $token->getType(),
     *          $lexer->nameOf($token->getType()),
     *          $token->getValue()
     *      ]);
     *  }
     *
     *  >> 379  | T_OPEN_TAG    | "<?php "
     *  >> 327  | T_IF          | "if"
     *  >> 382  | T_WHITESPACE  | " "
     *  >> 0    | UNKNOWN       | "("
     *  >> 319  | T_STRING      | "false"
     *  >> 0    | UNKNOWN       | ")"
     *  >> 382  | T_WHITESPACE  | " "
     *  >> 0    | UNKNOWN       | "{"
     *  >> 348  | T_RETURN      | "return"
     *  >> 382  | T_WHITESPACE  | " "
     *  >> 319  | T_STRING      | "true"
     *  >> 0    | UNKNOWN       | ";"
     *  >> 382  | T_WHITESPACE  | " "
     *  >> 0    | UNKNOWN       | "}"
     * </code>
     *
     * @param ReadableInterface $source
     * @return iterable|TokenInterface[]
     *
     * @throws LexerExceptionInterface
     * @throws RuntimeExceptionInterface
     */
    public function lex(ReadableInterface $source): iterable;

    /**
     * Get the symbolic name of a given token id.
     *
     * @param int $id
     * @return string
     */
    public function nameOf(int $id): string;
}
