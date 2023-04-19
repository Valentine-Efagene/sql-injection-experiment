<?php
session_start();
session_destroy();

header('Location: ' . '/nedu/');
die();
