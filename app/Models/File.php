<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
    private $_file = null;

    public function setFile($file)
    {
    	$this->_file = $file;
    	return $this;
    }

    public function file()
    {
    	return $this->_file;
    }

    public function failed($message)
    {
    	return array('uploaded' => false, 'message' => $message);
    }

    public function upload($path = 'uploads', $filename = null) {
    	if (!$this->file()) return $this->failed('File not found');
    	$filename = $filename ?: $this->file()->getClientOriginalName();
    	
    	if(!is_dir($path)) {
    		mkdir($path, 0777);
    	}

    	$path = $path . '/' . $filename;
    		
    	if (move_uploaded_file($this->file()->getPathName(), $path)) {
    		return array('uploaded' => true, 'path' => $path);
    	}
    	return $this->failed('Error uploading file');
    }
}
