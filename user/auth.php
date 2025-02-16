<?php
session_start();

include '../config.php';
$query = new Database();
$query->checkUserSession('user');
