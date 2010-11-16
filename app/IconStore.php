<?php

/**
 * IconStore Application driver
 *
 * @copyright  Copyright (c) 2010 Jan Palounek
 * @package    IconStore
 */

final class IconStore {
	
	protected $grabber;
	protected $generator;
	
	private function loadExternals() {
		$this->grabber = new Grabber();
		$this->generator = new Generator();
	}
	
	public function perform() {
		$this->loadExternals();
		
		$this->generator->generateHead();
		
		$collections = $this->grabber->getFolders(ICON_DIR);
		
		foreach($collections as $collection) {			
			$icons = $this->grabber->getIcons($collection, ICON_DIR);
			
			if($icons) {
				$this->generator->generateIconList($this->grabber->isolateCollectionName(ICON_DIR, $collection), $collection, $icons, $this->grabber->getIconType(ICON_DIR, $collection));
			}
			
			unset($icons);
		}
		
		$this->generator->generateFoot();
	}
}