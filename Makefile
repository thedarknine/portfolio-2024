.DEFAULT_GOAL := help
SHELL := /bin/bash

.PHONY: *

## Clear cache
cc:
	symfony console cache:clear

## Build front-end
build:
	php bin/console sass:build
	php bin/console tailwind:build --minify
	php bin/console asset-map:compile

## Run php cs-fixer
cs:
	vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.php --diff --verbose
	vendor/bin/twig-cs-fixer lint templates

## Run dev front-end
watch:
## php bin/console sass:build --watch
	php bin/console tailwind:build --watch

## Update MySQL schema
mysql-update:
	symfony console make:migration
	symfony console doctrine:migrations:migrate

## Add data fixtures
fixtures:
	symfony console doctrine:fixtures:load

## Check security
security:
	symfony check:security

## Switch to dev env
dev:
	composer dump-env
	symfony console cache:clear

## Build to production
prod:
	php bin/console tailwind:build --minify
	php bin/console asset-map:compile
	composer dump-env prod
	composer install --no-dev --optimize-autoloader
	APP_ENV=prod APP_DEBUG=0 php bin/console cache:clear


## ------

# APPLICATION
APPLICATION := Portfolio

# COLORS
GREEN  := $(shell tput -Txterm setaf 2)
YELLOW := $(shell tput -Txterm setaf 3)
WHITE  := $(shell tput -Txterm setaf 7)
RESET  := $(shell tput -Txterm sgr0)

TARGET_MAX_CHAR_NUM=20
## Show this help
help:
	@echo '# ${YELLOW}${APPLICATION}${RESET}'
	@echo ''
	@echo 'Usage:'
	@echo '  ${YELLOW}make${RESET} ${GREEN}<target>${RESET}'
	@echo ''
	@echo 'Targets:'
	@awk '/^[a-zA-Z\-\_0-9]+:/ { \
		helpMessage = match(lastLine, /^## (.*)/); \
		if (helpMessage) { \
			helpCommand = substr($$1, 0, index($$1, ":")); \
			gsub(":", " ", helpCommand); \
			helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
			printf "  ${YELLOW}%-$(TARGET_MAX_CHAR_NUM)s${RESET} ${GREEN}%s${RESET}\n", helpCommand, helpMessage; \
		} \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST) | sort