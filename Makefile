install:
	docker-compose build
	docker-compose up -d
	symfony composer doc:mi:mi

start:
	docker-compose up -d
	symfony server:start -d

stop:
	symfony server:stop
	docker-compose down --remove-orphans

load:
	doctrine:fixtures:load

watch:
	yarn encore dev --watch

log:
	symfony server:log
