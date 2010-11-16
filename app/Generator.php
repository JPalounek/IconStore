<?php

/**
 * IconStore HTML Generator
 *
 * @copyright  Copyright (c) 2010 Jan Palounek
 * @package    IconStore
 */

//86

final class Generator {	
	// TODO Make it externally configurable
	public $iconsPerLine = 12;
	
	// TODO Replace to grabber
	private $supportedTypes = array('png', 'ico');
	
	// TODO Replace to grabber
	private function getIconType($file) {				
		foreach($this->supportedTypes as $fileType) {			
			if(substr($file, -3) == $fileType) {
				$detecetedType = $fileType;
				break;
			}
		}
		
		if(!$detecetedType) {
			$detecetedType = substr($file, -3);
		}		
		
		return $detecetedType;		
	}	
	
	public function generateHead() {
		echo '<!DOCTYPE html>
				<html>
				 <head>
				  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

				  <meta name="author" content="Jan Palounek">
				  <meta name="copyright" content="Jan Palounek 2010">

				  <title> ' . SITE . ' - Have your icons under controll </title>

				  <link rel="stylesheet" media="screen,projection,tv" href="/css/screen.css" type="text/css">
				  <link rel="stylesheet" media="print" href="/css/print.css" type="text/css">
				  <link rel="shortcut icon" href="/gfx/favicon.ico" type="image/x-icon">

				  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
				</head>
			<body>
			
			<div id="head"> 
			 <h1> ' . SITE . ' </h1> 
			 <h3> ' . VERSION . ' </h3>
			</div>';
	}
	
	// TODO Failed solution. Make it better!
	public function generateIconList($collectionName, $folderName, $iconList, $fileType) {                
                // echo ;

		echo '<h3> <div class="'. $this->getIconType($iconList[1]) .'">' . $collectionName . ' </div> </h3>';
		
		$i=0;
		
		echo '<div id="list">';
		echo '<table>';
		echo ' <tr>';
		foreach($iconList as $icon) {
			$i++;			
			if(ICON_DIR_NAME . $icon != 'iconsArray') {
				echo '<td> <a href="' . ICON_DIR_NAME . $icon . '"> <img src="' . ICON_DIR_NAME . $icon . '" alt="'. $icon .'"> </a> </td>';				
			}										
			if($i == $this->iconsPerLine) {
				echo '</tr> <tr>';
				$i=0;
			}
			
		}
		echo ' </tr>';
		echo '</table>';
		echo '</div>';

		echo '<br> <br> <br>';		
		echo '<hr>';		
	}
	
	public function generateFoot() {
		echo '<div id="foot"> &copy Jan Palounek 2010 </div>  
		       </body>
		      </html>';
	} 
}