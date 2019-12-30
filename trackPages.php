<?php
	function visitedPages($pagename) {
		$cookie_name = "visitedPages";
		if(!isset($_COOKIE[$cookie_name])) {
			$value = array();
		}
		else {
			$value = json_decode($_COOKIE[$cookie_name]);
		}

		array_push($value, $pagename);
		$value = json_encode($value);
		setcookie($cookie_name, $value, time() + (86400 * 30), "/");
	}

	function drawTable($array) {
		foreach ($array as $item) {
			echo "<tr>";
			echo "<td>".$item."</td>";
			echo "</tr>";
		}
	}

	function display_visited_pages() {
                echo "Visited pages";

				$cookie_name = "visitedPages";
				if(!isset($_COOKIE[$cookie_name])) {
					echo "No pages to display";
				}
				else {
					echo "
						<br><table class='table table-striped' border='1'>
						<thread><tr style='font-size:15px;'><th>Pages</th></tr></thread><tbody>";
					$value = json_decode($_COOKIE[$cookie_name]);
					drawTable($value);
					echo "</tbody></table></body>";
				}
		echo "</html>";
		
	}
	function clearCookies($clearSession = false){
        $past = time() - 3600;
        if ($clearSession === false)
            $sessionId = session_id();
        foreach ($_COOKIE as $cookie_name => $value){
            if ($clearSession !== false || $value !== $sessionId)
                setcookie($cookie_name, $value, $past, '/');
    }
}

?>