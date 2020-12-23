#  Build database and REST API of Chinese Poetry

This is a laravel project to build database and REST API of Chinese Poetry

## Data Source 
https://github.com/chinese-poetry/chinese-poetry

## Artisan Commands
<b>Pull Authors data</b><br/>
chinese-poetry:pull-authors {dynasty} {--flush} <br/>
This command will pull authors data from https://github.com/chinese-poetry/chinese-poetry 
<br>if flush option is specified will truncate authors table then pull all authors
<br>if dynasty  is not specified will pull all dynasty
<br>Dynasty Options
- tang
- song
<br>

## API Endpoint

## Terms of Use
