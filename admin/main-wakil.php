<?php
/**
 * Wakil Main Page
 *
 * @package Wakil\Admin
 */
	$output = new Wakil_Admin_Settings();

	if($_POST){
		$output->save();
	}

	$output->output();