
BASE_URL="http://127.0.0.1:8080/api/v1"

EMAIL="test@example.com"
PASSWORD="password123"

echo "Получение токена..."
API_TOKEN=$(curl -s -X POST -H "Content-Type: application/json" \
  -d "{\"email\": \"$EMAIL\", \"password\": \"$PASSWORD\"}" \
  "$BASE_URL/login" | jq -r '.api_token')

if [ -z "$API_TOKEN" ] || [ "$API_TOKEN" == "null" ]; then
  echo "Ошибка: Токен не получен. Проверьте логин и пароль."
  exit 1
fi

echo "Токен получен: $API_TOKEN"
echo

echo "Получение списка задач..."
TASKS=$(curl -s -X GET -H "Authorization: Bearer $API_TOKEN" \
  "$BASE_URL/tasks")

echo "Список задач:"
echo $TASKS | jq
echo

echo "Создание новой задачи..."
NEW_TASK=$(curl -s -X POST -H "Authorization: Bearer $API_TOKEN" \
  -H "Content-Type: application/json" \
  -d '{"title": "My New Task", "text": "Description of my new task", "tags": [2, 6]}' \
  "$BASE_URL/new_task")

echo "Новая задача создана:"
echo $NEW_TASK | jq