<?php
require('setup/koneksi.php');
session_start();
if(isset($_SESSION['nama'])){
    session_destroy();
    header('location: login.php');
}