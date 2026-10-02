#!/usr/bin/env bash
set -e

GEN_PASS() { openssl rand -base64 18 | tr -dc 'a-zA-Z0-9' | head -c 24; }

ENV_FILE=".env"

if [ -f "$ENV_FILE" ]; then
    echo ".env đã tồn tại, giữ nguyên."
    exit 0
fi

echo "Đang tạo file .env..."
cat <<EOT > $ENV_FILE
DOMAIN=localhost
MYSQL_ROOT_PASSWORD=$(GEN_PASS)
MYSQL_DATABASE=wordpress
MYSQL_USER=wp_user
MYSQL_PASSWORD=$(GEN_PASS)
GRAFANA_ADMIN_PASSWORD=$(GEN_PASS)
EOT

echo "Đã tạo file .env thành công!"
