<?php

/**
 * IconStore Grabber
 *
 * @copyright  Copyright (c) 2010 Jan Palounek
 * @package    IconStore
 */

use Nette\Finder;

final class Grabber {
	private $icons = array();
	private $iconNames = array();
	private $folders = array();
	private $supportedTypes = array('png', 'ico');
	
	private function isolateName($path, $file) {
		$name = str_replace($path, '', $file);
		return $name;
	}
	
	private function isolateNames($path, $files) {		
		$results = array();
		
		if(!$files) {
			echo 'No name gave, nothing to isolate!';
		} else {
			foreach($files as $file) {
				$results[] = $this->isolateName($path, $file);
			}			
		}
		
		return $results;
	}
	
	private function isolateType($fileName) {
            $fileName = substr($fileName, -3);
            return $fileName;
	}
	
	public function isolateCollectionName($path, $folder) {
		$name = str_replace($path, '', $folder);
		$name = str_replace('/', '', $name);
		
		return $name;
	}
	
	
	public function getIconType($folderName, $path) {				
		foreach($this->supportedTypes as $fileType) {
			$files = Finder::findFiles('*.' . $fileType)->from($folderName);
			if($files) {
				$detecetedType = $fileType;
				break;
			}
		}
		
		if(!$detecetedType) {
			$detecetedType = 'not_supported';
		}		
		
		return $detecetedType;		
	}	
	
	public function getFolders($path) {
		$this->folders = Finder::findDirectories('*')->in($path);
		
		if($this->folders) {
			return $this->folders;
		} else {
			echo 'No directory found!';
		}		
	}
	
	public function getIcons($folderName, $path) {
		unset($this->icons);
		
		$filesPathes = Finder::findFiles('*')->from($folderName);
		
		$files = $this->isolateNames($path, $filesPathes);
			
		foreach($files as $file) {
			foreach($this->supportedTypes as $type) {
				if($this->isolateType($file) == $type) {
					$this->icons[] = $file;
				}
			}
		}
		
		$this->iconNames = $this->isolateNames($path, $this->icons);
		
		return $this->iconNames;
	}
}