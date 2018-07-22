#!/usr/bin/env bash
mkdir -p cron
# Add this file in crontab to use admin commands
for f in cron/*.sh; do
  bash "$f" -H   || break
  rm "$f"
done