# Port.hu

[![Build Status](https://travis-ci.com/PoLaKoSz/Port.hu.svg?branch=master)](https://travis-ci.com/PoLaKoSz/Port.hu)
[![Latest Stable Version](https://poser.pugx.org/polakosz/porthu/v/stable)](https://packagist.org/packages/polakosz/porthu)
[![Total Downloads](https://poser.pugx.org/polakosz/porthu/downloads)](https://packagist.org/packages/polakosz/porthu)
[![License](https://poser.pugx.org/polakosz/porthu/license)](https://packagist.org/packages/polakosz/porthu)

[Port.hu](https://port.hu/) is one of the biggest hungarian movie database. This PHP library helps to search for movies and to get informations for a specific movie.

## Install

Via Composer

`$ composer require polakosz/porthu`

## Usage

```` php
use PoLaKoSz\PortHu\MoviePage;
...
$port = new MoviePage();

// returns a PoLaKoSz\PortHu\Models\PortMovie object
$movie = $port->get( 104833 );

var_dump( $movie );
````

```` php
use PoLaKoSz\PortHu\QuickSearch;
...
$search = new QuickSearch();

// returns an Array of PoLaKoSz\PortHu\Models\QuickSearchResult object
$movies = $search->get( 'Viskó' );

var_dump( $movies );
````

## Tests

- `$ composer run-all-tests`: runs both integration and regression tests
- `$ composer run-i-tests`: runs only the integration tests (saved webpage parsing)
- `$ composer run-r-tests`: runs only the regression tests (to detect HTML DOM changes in the endpoints - downloads webpage(s) from Port.hu and after try to parse them)
- `$ composer run-u-tests`: runs only the unit tests
