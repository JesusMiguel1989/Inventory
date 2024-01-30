until mysqladmin ping -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" --silent; do
    echo "Esperando a que MySQL esté disponible..."
    sleep 1
done

php artisan migrate

exec "$@"
