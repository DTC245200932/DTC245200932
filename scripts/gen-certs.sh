#!/usr/bin/env bash
set -e

DOMAIN=${1:-localhost}
CERT_DIR="./nginx/certs"

mkdir -p "$CERT_DIR"

echo "Đang tạo chứng chỉ SSL Self-signed cho: $DOMAIN..."

openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
  -keyout "$CERT_DIR/selfsigned.key" \
  -out "$CERT_DIR/selfsigned.crt" \
  -subj "/CN=$DOMAIN/O=Dev/C=VN"

echo "Đã sinh chứng chỉ SSL thành công!"
