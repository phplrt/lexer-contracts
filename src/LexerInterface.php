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
     * @return string|null
     */
    public function getTokenName(int $id): ?string;
}
