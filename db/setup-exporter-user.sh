#!/bin/sh
set -eu

case "${MYSQL_EXPORTER_USER:-}" in
	''|*[!A-Za-z0-9_]*)
		echo "MYSQL_EXPORTER_USER must contain only letters, numbers, or underscores." >&2
		exit 1
		;;
esac

case "${MYSQL_EXPORTER_PASSWORD:-}" in
	''|*[!A-Za-z0-9_]*)
		echo "MYSQL_EXPORTER_PASSWORD must contain only letters, numbers, or underscores." >&2
		exit 1
		;;
esac

mysql --protocol=socket -u root -p"${MYSQL_ROOT_PASSWORD}" <<SQL
CREATE USER IF NOT EXISTS '${MYSQL_EXPORTER_USER}'@'%' IDENTIFIED BY '${MYSQL_EXPORTER_PASSWORD}';
ALTER USER '${MYSQL_EXPORTER_USER}'@'%' IDENTIFIED BY '${MYSQL_EXPORTER_PASSWORD}';
GRANT PROCESS, REPLICATION CLIENT, SELECT ON *.* TO '${MYSQL_EXPORTER_USER}'@'%';
SQL
