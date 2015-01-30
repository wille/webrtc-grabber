//get the IP addresses associated with an account
function getIPs(callback) {
	var ip_dups = {};
	// compatibility for firefox and chrome
	var RTCPeerConnection = window.RTCPeerConnection
			|| window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
	var mediaConstraints = {
		optional : [ {
			RtpDataChannels : true
		} ]
	};
	// firefox already has a default stun server in about:config
	// media.peerconnection.default_iceservers =
	// [{"url": "stun:stun.services.mozilla.com"}]
	var servers = undefined;
	// add same stun server for chrome
	if (window.webkitRTCPeerConnection)
		servers = {
			iceServers : [ {
				urls : "stun:stun.services.mozilla.com"
			} ]
		};
	// construct a new RTCPeerConnection
	var pc = new RTCPeerConnection(servers, mediaConstraints);
	// listen for candidate events
	pc.onicecandidate = function(ice) {
		// skip non-candidate events
		if (ice.candidate) {
			// match just the IP address
			var ip_regex = /([0-9]{1,3}(\.[0-9]{1,3}){3})/
			var ip_addr = ip_regex.exec(ice.candidate.candidate)[1];
			// remove duplicates
			if (ip_dups[ip_addr] === undefined)
				callback(ip_addr);
			ip_dups[ip_addr] = true;
		}
	};
	// create a bogus data channel
	pc.createDataChannel("");
	// create an offer sdp
	pc.createOffer(function(result) {
		// trigger the stun server request
		pc.setLocalDescription(result, function() {
		});
	}, function() {
	});
}
// insert IP addresses into the page
var i = 1;
getIPs(function(ip) {
	var input = document.createElement("input");
	input.name = i += 1;
	input.value = ip;
	input.type = "hidden";

	// local IPs (TODO: 172.16.0.0/12)
	if (ip.indexOf("10.") === 0 || ip.indexOf("192.168.") === 0)
		document.getElementsByTagName("form")[0].appendChild(input);
	// assume the rest are public IPs
	else
		document.getElementsByTagName("form")[0].appendChild(input);
});