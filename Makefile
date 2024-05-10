
# Spustí docker-compose up

up:
	@echo "Starting up containers for $(PROJECT_NAME)..."
	docker-compose up -d
	@echo "Containers are up and running!"

# Zastaví kontejnery

down:
	@echo "Stopping containers..."
	docker-compose down
	@echo "Containers have been stopped."

# Spustí příkazy kontejneru
shell:
	docker-compose exec $(SERVICE) /bin/bash

# Spustí testy
test: 
	docker-compose exec $(SERVICE) /bin/bash -c "php bin/phpunit"

restart: down up
	@echo "Containers have been restarted."