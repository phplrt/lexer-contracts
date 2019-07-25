<p align="center">
    <a href="https://railt.org"><img src="https://avatars2.githubusercontent.com/u/49816277?s=128" width="128" alt="Phplrt" /></a>
</p>

## Lexer Contracts

A set of interfaces for abstraction over lexers.

## Lexer Interfaces

```php
namespace Phplrt\Contracts\Lexer;

use Phplrt\Contracts\Source\ReadableInterface;

interface LexerInterface
{
    public function lex(ReadableInterface $source): iterable;
}

interface TokenInterface
{
    public function getType(): ?int;
    public function getOffset(): int;
    public function getValue(): string;
    public function getBytes(): int;
}
```

## Lexer Exceptions

```php
namespace Phplrt\Contracts\Lexer\Exception;

use Phplrt\Contracts\Exception\SourceExceptionInterface;

interface LexerExceptionInterface extends \Throwable
{
}

interface RuntimeExceptionInterface extends SourceExceptionInterface, LexerExceptionInterface
{
}
```
