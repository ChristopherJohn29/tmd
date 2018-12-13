<?php

namespace Mobiledrs\entities\user_management;

class Photo_entity extends \Mobiledrs\entities\Entity {

	protected $user_photo;

	private $upload_dir = './uploads/users';

	public function generate_filename() : string
	{
		return ( ! empty($this->user_photo)) ?
        	$this->user_photo : (date_timestamp_get(date_create()) . '.jpg');
	}

	public function has_exiting_photo() : bool
	{
		return file_exists($this->upload_dir . '/' . $this->user_photo);
	}

	public function delete_photo() : bool
	{
		return unlink($this->upload_dir . '/' . $this->user_photo);
	}
}