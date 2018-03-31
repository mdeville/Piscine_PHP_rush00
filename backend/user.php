<?php

import("general.php");

function add_user($login, $passwd, $group) {
	if (!$login || !$passwd || !$group)
		return FALSE;
	if (($data = file_to_data("../private/passwd")) === FALSE || isset($data[$login]))
		return FALSE;
	$data[$login] = array();
	$data[$login]['passwd'] = hash("whirlpool", $passwd);
	$data[$login]['group'] = $group;
	if (data_to_file($data, "../private/passwd") === FALSE)
		return FALSE;
	return TRUE;
}

function auth($login, $passwd) {
	if ($login == "" || $passwd == "")
		return FALSE;
	if (($data = file_to_data("../private/passwd")) === FALSE)
		return FALSE;
	$passwd = hash("whirlpool", $passwd);
	if ($data[$login]['passwd'] === $passwd)
		return TRUE;
	else
		return FALSE;
}

function remove_user($login) {
	if ($login == "")
		return FALSE;
	if (($data = file_to_data("../private/passwd")) === FALSE)
		return FALSE;
	@unset($data[$login]);
	if (data_to_file($data, "../private/passwd") === FALSE)
		return FALSE;
	return TRUE;
}

function modif_pwd($login, $oldpwd, $newpwd) {
	if ($login == "" || $oldpwd == "" || $newpwd == "")
		return FALSE;
	if (($data = file_to_data("../private/passwd")) === FALSE || !isset($data[$login]) || !isset($data[$login]['passwd']))
		return FALSE;
	$oldpwd = hash("whirlpool", $oldpwd);
	if ($data[$login]['passwd'] !== $oldpwd)
		return FALSE;
	$data[$login]['passwd'] = hash("whirlpool", $newpwd);
	if (data_to_file($data, "../private/passwd") === FALSE)
		return FALSE;
	return TRUE;
}

/*
 * @authors ctrouill
 * @doc retrieve user groups from login
 * @params login user login
 * @return Maybe string
 */
function get_user_group($login) {
    if (!$login || $login == "") {
        return (null);
    }
    if (($data = file_to_data("../private/passwd")) === FALSE)
    	return FALSE;
    if (isset($data[$login]))
    	return $data[$login]['group'];
}

?>
