build:
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down

restart: down up

init-env:
	ln -s "${PWD}/app/.env" "${PWD}/.env"