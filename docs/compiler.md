# Compiler

This is the implementation of the so-called compiler-compiler based on 
the basic capabilities of [Hoa\Compiler](https://github.com/hoaproject/Compiler).

The library is needed to create parsers from grammar files and is not used 
during the parsing itself, this is only required for development.

Before you begin to work with custom implementations of parsers, it is 
recommended that you review the [EBNF](https://en.wikipedia.org/wiki/Extended_Backus%E2%80%93Naur_form)

## Parser compilation

Reading a grammar is quite simple operation, but it still takes time 
to execute. After the grammar rules have been formulated, you can "fix" the version 
in a separate parser class that will contain all the logic and no longer require 
reading the source code. After you compile it into a class, this package (railt/compiler) 
can be excluded from composer dependencies.

```php
$compiler = Compiler::load(File::fromPathname('path/to/grammar.pp2'));

$compiler->setNamespace('Example')
    ->setClassName('Parser')
    ->saveTo(__DIR__);
```

This code example will create a parser class in the current directory 
with the required class and namespace names. An example of the result of generation 
can be found [in an existing project here](https://github.com/railt/compiler/blob/master/src/Grammar/Parser.php).
As a source, [this grammar file](https://github.com/railt/compiler/blob/master/resources/grammar.pp2). 