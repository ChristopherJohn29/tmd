<?php

class SessionMock {
	private $flashMessage = null;

	public function userdata(string $sessionName)
	{
		return '1';
	}

	public function flashdata($key)
	{
		return $this->flashMessage[$key];
	}

	public function set_flashdata($key, $message)
	{
		$this->flashMessage[$key] = $message;
	}
}