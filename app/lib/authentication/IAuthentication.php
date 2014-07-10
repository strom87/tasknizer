<?php namespace authentication;

interface IAuthentication {

    function login($email_or_name, $password, $remember_me);

    function userExists($email);

    function userIsActivated($email);

    function getEmailFromName($value);

    function rehashPasswordIfNeeded($email, $password);

    function getErrorType($type);

}