#webrtc-grabber
PoC grabbing IP address behind a VPN - Based of https://github.com/diafygi/webrtc-ips, saves all found addresses for anyone who visits with WebRTC

All that needs to be done to get this working is to upload webrtc.js and index.php to the same directory on your web server

Saves in log.txt:

- User agent
- Connecting IP address
- Referer
- Founds addresses (local as well)

Requirements:

- PHP
- Write permissions in same directory as index.php