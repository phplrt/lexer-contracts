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
     *
     *  foreach ((new PhpLexer())->lex($source) as $token) {
     *      echo vsprintf('%5s | "%s"' . "\n", [
     *          $token->getType(),
     *          $token->getValue()
     *      ]);
     *  }
     *
     *  >> 379 | "<?php "
     *  >> 327 | "if"
     *  >> 382 | " "
     *  >> 0   | "("
     *  >> 319 | "false"
     *  >> 0   | ")"
     *  >> 382 | " "
     *  >> 0   | "{"
     *  >> 348 | "return"
     *  >> 382 | " "
     *  >> 319 | "true"
     *  >> 0   | ";"
     *  >> 382 | " "
     *  >> 0   | "}"
     * </code>
     *
     * @param ReadableInterface $source
     * @return iterable|TokenInterface[]
     *
     * @throws LexerExceptionInterface
     * @throws RuntimeExceptionInterface
     */
    public function lex(ReadableInterface $source): iterable;
}
