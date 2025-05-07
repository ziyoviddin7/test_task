### Установка и запуск

```bash
# 1. Клонировать репозиторий
git clone https://github.com/ziyoviddin7/test_task.git
cd test_task

# 2. Сборка и запуск контейнеров
docker compose up -d --build

# 3. Установка зависимостей
docker compose exec php-cli
composer install

# 4. Настройка прав (для Linux/macOS)
sudo chmod 777 -R ./

# 5. docker compose exec node sh
npm install
npm run build
npm run dev

# 5. Выполнение миграций с тестовыми данными
docker compose exec php-cli
php artisan migrate:fresh
php artisan db:seed --class=UserSeeder

#6. chmod +x test_api.sh
./test_api.sh
```
