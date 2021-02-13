[![Build Status](https://travis-ci.org/mitsuru793/php-index-dump-cli.svg?branch=master)](https://travis-ci.org/mitsuru793/php-index-dump-cli)

# Index Dumper Cli

## Summary

```
> dump hello

 ----------------- ---
  strlen            5
  mb_strlen         5
  grapheme_strlen   5
 ----------------- ---


 str_split
+-------+---+---+---+---+---+
| index | 0 | 1 | 2 | 3 | 4 |
| value | h | e | l | l | o |
+-------+---+---+---+---+---+
 mb_str_split
+-------+---+---+---+---+---+
| index | 0 | 1 | 2 | 3 | 4 |
| value | h | e | l | l | o |
+-------+---+---+---+---+---+
```

## Links

string
* [PHP: Grapheme 関数 \- Manual](https://www.php.net/manual/ja/ref.intl.grapheme.php)
* [PHP: マルチバイト文字列 \- Manual](https://www.php.net/manual/ja/book.mbstring.php)

symfony/console
* [Table \(The Console Component \- Symfony Docs\)](https://symfony.com/doc/current/components/console/helpers/table.html)
* [How to Style a Console Command \(Symfony Docs\)](https://symfony.com/doc/current/console/style.html)