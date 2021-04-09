install:
	docker-compose build
	docker-compose up -d
	symfony composer install
	yarn install
	yarn encore dev --watch
	symfony console doc:mi:mi

start:
	docker-compose up -d
	symfony server:start -d

stop:
	symfony server:stop
	docker-compose down --remove-orphans

load:
	symfony console doctrine:fixtures:load

watch:
	yarn encore dev --watch

log:
	symfony server:log
