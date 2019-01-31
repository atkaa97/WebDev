<?php

function file_path($path)
{
	return preg_replace("/\\//", DIRECTORY_SEPARATOR, $path);
}

function base_path($path)
{
	return file_path(BASE_PATH . '/' . $path);
}

function view($view_name, $view_properties = [], $layout = 'main')
{
	$views_path = '/App/Views/';
	$requested_view = base_path($views_path . $view_name . '.php');
	if (!file_exists($requested_view)) {
        return "View not found";
	}
	$layout_view = base_path($views_path . '/layouts/' . $layout . '.php');
	if (!file_exists($layout_view)) {
        return "Layout view not found";
	}
	ob_start();
	require_once($layout_view);
	$layout = ob_get_clean();
	ob_start();
	require_once($requested_view);
	$view = ob_get_clean();
	$view = str_replace('@content', $view, $layout);
	return $view;
}

function redirect($url)
{
	header('Location: ' . $url);
	die();
}