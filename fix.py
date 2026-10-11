with open('docker-compose.yml', 'r') as f:
lines = f.readlines()

new_lines = []
skip = False
for line in lines:
if line.strip().startswith('prometheus:'):
    skip = True
    continue
if skip and line.strip() and not line.startswith(' ') and not line.startswith('  '):
    skip = False
if not skip:
    new_lines.append(line)

clean_prom = """  prometheus:
image: prom/prometheus:latest
container_name: prometheus
ports:
  - "9090:9090"
restart: always
command:
  - '--config.file=/etc/prometheus/prometheus.yml'
  - '--storage.tsdb.path=/prometheus'
  - '--storage.tsdb.retention.time=7d'
volumes:
  - ./prometheus/prometheus.yml:/etc/prometheus/prometheus.yml:ro
"""
new_lines.append(clean_prom)

with open('docker-compose.yml', 'w') as f:
f.writelines(new_lines)
