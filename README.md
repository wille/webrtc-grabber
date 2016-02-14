#webrtc-grabber
PoC grabbing IP address behind a VPN - Based on https://github.com/diafygi/webrtc-ips, saves all found addresses for anyone who visits with WebRTC

All that needs to be done to get this working is to upload webrtc.js and index.php to the same directory on your web server.

A file named log.txt will be created where the logs will be stored

Saves in log.txt:

- Time and Date
- User agent
- Connecting IP address
- Referer
- Found addresses (local as well)

Requirements:

- PHP
- Write permissions in same directory as index.php
