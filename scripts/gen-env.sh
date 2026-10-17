#!/usr/bin/env bash
set -e

GEN_PASS() { openssl rand -base64 18 | tr -dc 'a-zA-Z0-9' | head -c 24; }

ENV_FILE=".env"

write_mysql_exporter_config() {
    exporter_user=$(awk -F= '$1 == "MYSQL_EXPORTER_USER" { value = substr($0, index($0, "=") + 1) } END { print value }' "$ENV_FILE")
    exporter_password=$(awk -F= '$1 == "MYSQL_EXPORTER_PASSWORD" { value = substr($0, index($0, "=") + 1) } END { print value }' "$ENV_FILE")

    case "$exporter_user$exporter_password" in
        ''|*[!A-Za-z0-9_]*)
            echo "Exporter username/password must contain only letters, numbers, or underscores." >&2
            exit 1
            ;;
    esac

    mkdir -p mysql-exporter
    umask 077
    printf '[client]\nuser=%s\npassword=%s\n' "$exporter_user" "$exporter_password" > mysql-exporter/.my.cnf
    chmod 600 mysql-exporter/.my.cnf
}

if [ -f "$ENV_FILE" ]; then
    if ! grep -q '^MYSQL_EXPORTER_USER=.' "$ENV_FILE"; then
        printf 'MYSQL_EXPORTER_USER=mysql_exporter\n' >> "$ENV_FILE"
    fi
    if ! grep -q '^MYSQL_EXPORTER_PASSWORD=.' "$ENV_FILE"; then
        printf 'MYSQL_EXPORTER_PASSWORD=%s\n' "$(GEN_PASS)" >> "$ENV_FILE"
    fi
    if ! grep -q '^MYSQL_EXPORTER_UID=.' "$ENV_FILE"; then
        printf 'MYSQL_EXPORTER_UID=%s\n' "$(id -u)" >> "$ENV_FILE"
    fi
    if ! grep -q '^MYSQL_EXPORTER_GID=.' "$ENV_FILE"; then
        printf 'MYSQL_EXPORTER_GID=%s\n' "$(id -g)" >> "$ENV_FILE"
    fi
    write_mysql_exporter_config
    echo ".env đã tồn tại; bổ sung các biến exporter còn thiếu (nếu có)."
    exit 0
fi

echo "Đang tạo file .env..."
cat <<EOT > $ENV_FILE
DOMAIN=localhost
MYSQL_ROOT_PASSWORD=$(GEN_PASS)
MYSQL_DATABASE=wordpress
MYSQL_USER=wp_user
MYSQL_PASSWORD=$(GEN_PASS)
MYSQL_EXPORTER_USER=mysql_exporter
MYSQL_EXPORTER_PASSWORD=$(GEN_PASS)
MYSQL_EXPORTER_UID=$(id -u)
MYSQL_EXPORTER_GID=$(id -g)
GRAFANA_ADMIN_PASSWORD=$(GEN_PASS)
EOT

write_mysql_exporter_config
echo "Đã tạo file .env thành công!"
