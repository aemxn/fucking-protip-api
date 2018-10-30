# Random Protip API

Original website [Fucking Homepage](http://fuckinghomepage.com/) (C) by Johnny Webber.

A web scraper based on PHP HTML DOM parser. Scrapes **Words of Wisdom of the Fucking Day** from [Fucking Homepage](http://fuckinghomepage.com/).

Framework used:
- Slim Framework 3.11
- sunra/php-simple-html-dom-parser 1.5.2

Install composer packages:

```
$ composer update
```

Run from `\v1` directory to run in dev mode:

```
$ php -S localhost:8080
```

Open browser, run `localhost:8080/random`.

Modification:

- Setting `offset=0` on `file_get_html()` function in `simple_html_dom.php` file. See issue [#41](https://github.com/sunra/php-simple-html-dom-parser/issues/41).

    > function file_get_html($url, $use_include_path = false, $context=null, **$offset = 0**, $maxLen=-1, $lowercase = true, $forceTagsClosed=true, $target_charset = DEFAULT_TARGET_CHARSET, $stripRN=true, $defaultBRText=DEFAULT_BR_TEXT, $defaultSpanText=DEFAULT_SPAN_TEXT)