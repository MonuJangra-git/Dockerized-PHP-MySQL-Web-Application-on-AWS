#!/bin/bash
# this is also run automatically
# ===== CONFIG =====
LOCAL_BACKUP_DIR="/home/ubuntu/mysql-backups/backups"
S3_BUCKET="s3://BUCKET-NAME/mysql-backups"
RETENTION_DAYS=30
# ==================

DATE=$(date +%F)
LOG_FILE="/home/ubuntu/mysql-backups/logs/s3-$DATE.log"

echo "=====================================" >> "$LOG_FILE"
echo "S3 Upload started at $(date)" >> "$LOG_FILE"

# Upload latest backups
aws s3 sync "$LOCAL_BACKUP_DIR" "$S3_BUCKET"

if [ $? -eq 0 ]; then
    echo "✅ S3 upload successful" >> "$LOG_FILE"
else
    echo "❌ S3 upload failed" >> "$LOG_FILE"
fi

echo "S3 Upload finished at $(date)" >> "$LOG_FILE"
echo "=====================================" >> "$LOG_FILE"
