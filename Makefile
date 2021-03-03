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

log:
	symfony server:log
