<?php $this->load->view('header'); ?>

<?php
if ($navbar != null) {
	$this->load->view($navbar);
}
?>

<?php
if ($sidebar != null) {
	$this->load->view($sidebar);
}
?>

<?php
if ($content != null) {
	$this->load->view($content);
} else {
	echo "No content available";
}
?>

<?php
if ($content != 'login' && $content != 'signup_v') {
	$this->load->view('footer');
}
?>

<?php $this->load->view('changePassword'); ?>

<div id="changePasswordContainer"></div>

<?php $this->load->view('scripts'); ?>