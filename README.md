# BkC GTagModeration

![License](https://img.shields.io/badge/license-MIT-blue.svg) [![Latest Stable Version](https://img.shields.io/packagist/v/block-cat/guest-tag-moderation.svg)](https://packagist.org/packages/block-cat/guest-tag-moderation)

**Extensia nu este publicată pe [Packagist](https://packagist.org/)!**

Aceasta este o extensie [Flarum](https://flarum.org/) care oferă posibilitate utilizatorilor, cu orientare către cei neînregistrați, să creeze etichete secundare noi și să le utilizeze în etichetarea articolelor.

Această extensie, adaugă un câmp nou în fereastra pentru selectarea etichetelor pentru articol. 

![](https://i.imgur.com/yMDUgH9.png)

În acest câmp trebuie introdus numele etichetei care va deveni etichetă secundară. Pentru crearea etichetei trebuie apăsat butonul `Creare`.

Eticheta nou creată va apărea în lista de etichete secundare de mai jos.

![](https://i.imgur.com/yOwlRVv.png)

## Compatibilitate

Această extensie este compatibilă cu versiunea `1.2.1` de [Flarum](https://flarum.org/).

De asemenea, extensia dată mai utilizează unele componente și funcționalități ale extensiei `flarum/tags`.

## Instalare

Pentru instalarea extensiei trebuie executată următoarea comandă Composer:

```sh
composer require block-cat/guest-tag-moderation *@dev
```

## Actualizare

Pentru actualizarea extensiei trebuie executată următoarea comandă Composer:

```sh
composer update block-cat/guest-tag-moderation
php flarum cache:clear
```

## Dezinstalare

Pentru dezinstalarea extensiei trebuie executată următoarea comandă Composer:

```sh
composer remove block-cat/guest-tag-moderation
php flarum cache:clear
```

## Link-uri utile

- [Cod sursă pe GitHub](https://github.com/block-cat/guest-tag-moderation)
- [Changelog](CHANGELOG.md)