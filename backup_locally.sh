#!/bin/bash

DATE=$(date +%F)
TIME=$(date +%H-%M-%S)
# user must provide the container name of mysql container
CONTAINER="mysql_container"
BACKUP_DIR="/home/ubuntu/mysql-backups"
LOG_DIR="$BACKUP_DIR/logs"

BACKUP_FILE="$BACKUP_DIR/backup-$DATE-$TIME.sql"
LOG_FILE="$LOG_DIR/backup-$DATE.log"

# Create directories if not exist
mkdir -p "$BACKUP_DIR"
mkdir -p "$LOG_DIR"

echo "=====================================" >> "$LOG_FILE"
echo "Backup started at $(date)" >> "$LOG_FILE"

# Run backup
if docker exec "$CONTAINER" \
    mysqldump -u root -proot --all-databases \
    > "$BACKUP_FILE"
then
    echo "✅ Backup successful: $BACKUP_FILE" >> "$LOG_FILE"
else
    echo "❌ Backup FAILED at $(date)" >> "$LOG_FILE"
    rm -f "$BACKUP_FILE"
fi

echo "Backup finished at $(date)" >> "$LOG_FILE"
echo "=====================================" >> "$LOG_FILE"
