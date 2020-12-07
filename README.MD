#  Build database and REST API of Chinese Poetry

This is a laravel project to build database and REST API of Chinese Poetry

## Data Source 
https://github.com/chinese-poetry/chinese-poetry

## Docker Configuration

### .env
Create an `.env` file from `.env.example`
```bash
cp .env.example .env

# Customize every variable according to your needs
# See comments to each variable in .env.example file
```
### Docker Containers list 
- chinese_poetry_fpm   PHP FPM container 
- chinese_poetry_nginx Nginx Container
- chinese_poetry_db DD Conatiner  

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
