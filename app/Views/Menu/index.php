<!-- index.php -->

<?= $this->extend('Templates/UserTemplate/Layout') ; ?>

<?= $this->section('content') ; ?>

<?php
include 'Section1.php';
include 'Section2.php';
include 'Section3.php';
?>

<!-- Add your CSS link here -->
<link rel="stylesheet" id="divi-style-css" href="https://www.elegantthemes.com/layouts/wp-content/themes/Divi/style-static.min.css?ver=4.23.0" type="text/css" media="all">

<?= $this->endSection() ; ?>