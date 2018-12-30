<?php

function admin_url($suffix, $datas = []) {
	$url = url('admin/'.$suffix);
	if(sizeof($datas) === 0) return $url;
	foreach ($datas as $key => $data) str_replace('{'. $key .'}', $data, $url);
	return $url;
}

function model_path() {
	return app_path('Models');
}