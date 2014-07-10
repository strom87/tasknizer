<?php

function gravatar($email)
{
	$size = 60;
	return'http://www.gravatar.com/avatar/'.md5(strtolower(trim($email))).'?&s='.$size;
}