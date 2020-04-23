<?php
	/*cookies:
		setcookie(name, value, expire, path, domain, secure, httpOnly)
			-name: cookie's name.
			-value: cookie's value (s).
			-expire: expire time in UNIX timestamp format.
			-path: specify the path on server that cookie is available '/' entire domain.
			-domain: host name
			-secure: 1 - only secure connections, 0 - any standard connections.
			-httpOnly: True: cookies are only made accessible through HTTP control. Good for  preventing XSS attacks.
	*/

	setcookie("username", "Adam", time()+60*60, "cookies-sessions/", "", 0, 0);

?>


