// node_request.php

<?php
	function getNodeResponse() {
		return file_get_contents('http://localhost:3000');
	}
?>