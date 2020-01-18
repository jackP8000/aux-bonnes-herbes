# Coding Style

.DEFAULT_GOAL := help

help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
##
## Project setup
##---------------------------------------------------------------------------
cs: ## check cs problem
	./vendor/bin/php-cs-fixer fix --dry-run --stop-on-violation --diff

cs-fix: ## fix problems
	./vendor/bin/php-cs-fixer fix

cs-ci:
	./vendor/bin/php-cs-fixer fix src/ --dry-run --using-cache=no --verbose

##
## start and stop server
##---------------------------------------------------------------------------
start: ## start symfony server
	symfony server:start

stop: ## stop server
	symfony server:stop

start-prod: ## start symfony server in production environnment
	symfony server:start --env=prod

##
## Encore Webpack
##---------------------------------------------------------------------------
compile: ## Compile and copy SASS and JS files in dev
	yarn encore dev-server
compile-prod: ## Compile and copy SASS and JS files in production
	yarn encore production

##
## database creation
##---------------------------------------------------------------------------
db-reset: ## Drop and recreate database
	./bin/console doctrine:database:drop --force --if-exists
	./bin/console doctrine:database:create

##
## production migration
##---------------------------------------------------------------------------
db-migrate: ## make migrationsm
	./bin/console doctrine:migrations:migrate -n

db-recreate: ## Reset and recreate database with migrations
db-recreate: db-reset db-migrate

##
## tests
##---------------------------------------------------------------------------
db-test-create: ## make migrations
	./bin/console doctrine:database:create --env=test
	./bin/console doc:sch:up --force --env=test

phpunit:
	./vendor/bin/phpunit

coverage:
	./vendor/bin/phpunit --coverage-html web/test-coverage

behat:
	./vendor/bin/behat

