<?php

namespace App\View\Helper;

use App\View\Helper\AppHelper;
use Cake\Error\Debugger;
use Cake\View\Helper;

class ImageResizeHelper extends Helper
{
  	var $helpers = array('Html');
  	var $cacheDir = 'imagecache'; // relative to 'img'.DS

  	//GD2 based img utility functions
  	/**
   	* Automatically resizes an image and returns formatted IMG tag
   	*
   	* @param string $path Path to the image file, relative to the webroot/img/ directory.
   	* @param integer $width Image of returned image
   	* @param integer $height Height of returned image
   	* @param boolean $proportionate Maintain aspect ratio (default: true)
   	* @param array    $htmlAttributes Array of HTML attributes.
   	* @param boolean $return Wheter this method should return a value or output it. This overrides AUTO_OUTPUT.
   	* @return mixed    Either string or echos the value, depends on AUTO_OUTPUT and $return.
   	* @access public
   	*/
	
  	function resize($path, $width, $height, $proportionate  = true, $htmlAttributes = array(), $return = false) 
	{
		$types = array(1 => "gif", "jpeg","jpg" ,"png", "swf", "psd", "wbmp"); // used to determine image type
	    if(empty($htmlAttributes['alt'])) $htmlAttributes['alt'] = 'thumb';  // Put alt default
	    
	    $fullpath = 'img'.DS;
	    $url = $fullpath.$path;

	    if (!($size = getimagesize($url))) 
	      	return; // image doesn't exist 
	    
	    if ($proportionate) 
	    { 
	    	if ($width == 0) $factor = $height/$size[1];
            elseif ($height == 0) $factor = $width/$size[0];
            else $factor = min ( $width / $size[0], $height / $size[1]);  
           
			$width = round ($size[0] * $factor);
            $height = round ($size[1] * $factor);

        }
        else 
        {
           
			$width = ( $width <= 0 ) ? $size[0] : $width;
            $height = ( $height <= 0 ) ? $size[1] : $height;
	    }
	    
	    $relfile =$this->cacheDir.'/'.$width.'x'.$height.'_'.basename($path); // relative file
	    $cachefile = $fullpath  . $this->cacheDir.DS.$width.'x'.$height.'_'.basename($path);  // location on server
	
	    if (file_exists($cachefile)) 
	    {
	      	$csize = getimagesize($cachefile);
	      	$cached = ($csize[0] == $width && $csize[1] == $height); // image is cached
	      	if (@filemtime($cachefile) < @filemtime($url)) // check if up to date
	      		$cached = false;
	    } 
	    else 
	    {
	      $cached = false;
	    }
	
	    if (!$cached) 
	    {
	      	$resize = ($size[0] > $width || $size[1] > $height) || ($size[0] < $width || $size[1] < $height);
	    } 
	    else 
	    {
	      	$resize = false;
	    }
	
	    if ($resize) 
	    {
	      	$image = call_user_func('imagecreatefrom'.$types[$size[2]], $url);
	      	if (function_exists("imagecreatetruecolor") && ($temp = imagecreatetruecolor ($width, $height))) 
	      	{
	        	imagecopyresampled ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
	      	} 
	      	else 
	      	{
	        	$temp = imagecreate ($width, $height);
	        	imagecopyresized ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
	      	}
	      	call_user_func("image".$types[$size[2]], $temp, $cachefile);
	      	imagedestroy ($image);
	      	imagedestroy ($temp);
			
	    } 
	    elseif (!$cached) 
	    {
	      copy($url, $cachefile);
	    }

	   	return $this->Html->image( $relfile, $htmlAttributes);
	}
	
	/**
	 * Performs a padded resize
	 *
	 * @param string $path
	 * @param integer $width
	 * @param integer $height
	 * @param unknown_type $backgroundColor
	 * @param array $htmlAttributes
	 * @param boolean $return Wheter this method should return a value or output it. This overrides AUTO_OUTPUT.
	 * @return mixed
	 */
	
	function paddedResize($path,$width, $height, $backgroundColor="FFFFFF",$htmlAttributes = array(), $return = false) 
	{
		$types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); // used to determine image type
	    if(empty($htmlAttributes['alt'])) $htmlAttributes['alt'] = 'thumb';  // Put alt default
	    
	    $fullpath = ROOT.DS.APP_DIR.DS.WWW_ROOT.DS.'img'.DS;
	    $url = $fullpath.$path;
	    
	    if (!($size = getimagesize($url))) 
	      	return; // image doesn't exist 
	      	
	    $temp = imagecreatetruecolor($width, $height);
		$bg = $this->color_web2gd($temp, $backgroundColor);
		imagefilledrectangle($temp, 0, 0, $width, $height, $bg);
	    
		$destAR = $width / $height;
		if ($size[0] > 0 && $size[1] > 0) 
		{
			// We can't divide by zero theres something wrong.
			
			$srcAR = $size[0] / $size[1];  //source aspect ratio
			
			// Destination narrower than the source
			if($destAR > $srcAR) 
			{
				$destY = 0;
				$destHeight = $height;
				
				$destWidth = $height * $srcAR;
				$destX = ($width - $destWidth) / 2;
				
				// Destination shorter than the source
			} 
			else 
			{
				$destX = 0;
				$destWidth = $width;
				
				$destHeight = $width / $srcAR;
				$destY = ($height - $destHeight) / 2;
			}	
		}
	    
	    $relfile = $this->request->webroot.DS.'img'.'/'.$this->cacheDir.'/'.$width.'x'.$height.'_'.basename($path); // relative file
	    $cachefile = $fullpath.$this->cacheDir.DS.$width.'x'.$height.'_'.basename($path);  // location on server
	
	    if (file_exists($cachefile)) 
	    {
	      	$csize = getimagesize($cachefile);
	      	$cached = ($csize[0] == $width && $csize[1] == $height); // image is cached
	      	if (@filemtime($cachefile) < @filemtime($url)) // check if up to date
	      		$cached = false;
	    } 
	    else 
	    {
	      $cached = false;
	    }
	
	    if (!$cached) 
	    {
	      	$resize = ($size[0] > $width || $size[1] > $height) || ($size[0] < $width || $size[1] < $height);
	    } 
	    else 
	    {
	      	$resize = false;
	    }
	
	    if ($resize) 
	    {
	      	$image = call_user_func('imagecreatefrom'.$types[$size[2]], $url);
	      	if (function_exists("imagecreatetruecolor")) 
	      	{
	        	imagecopyresampled($temp, $image, $destX, $destY, 0, 0, $destWidth, $destHeight, $size[0], $size[1]);
	      	} 
	      	else 
	      	{
	        	imagecopyresized ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
	      	}
	      	call_user_func("image".$types[$size[2]], $temp, $cachefile);
	      	imagedestroy ($image);
	      	imagedestroy ($temp);
	    } 
	    elseif (!$cached) 
	    {
	      copy($url, $cachefile);
	    }
	
	   	return $this->Html->image( $relfile, $htmlAttributes);
		
		
	}
	
	static function color_web2gd($image, $webColor) 
	{
		if(substr($webColor,0,1) == "#") $webColor = substr($webColor,1);
		$r = hexdec(substr($webColor,0,2));
		$g = hexdec(substr($webColor,2,2));
		$b = hexdec(substr($webColor,2,2));

		return imagecolorallocate($image, $r, $g, $b);

	}
	
	//ImageMagick based img utility functions
	
	function imResizeCrop($path, $width, $height, $htmlAttributes = array(), $return = false)
	{
		$types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); // used to determine image type
	    if(empty($htmlAttributes['alt'])) $htmlAttributes['alt'] = 'thumb';  // Put alt default
	    
	    $fullpath = ROOT.DS.APP_DIR.DS.WWW_ROOT.DS.'img'.DS;
	    $url = $fullpath.$path;
	    
	    if (!($size = getimagesize($url))) 
	      	return; // image doesn't exist 
	    

	    $relfile = $this->request->webroot.DS.'img'.'/'.$this->cacheDir.'/'.$width.'x'.$height.'_'.basename($path); // relative file
	    $cachefile = $fullpath.$this->cacheDir.DS.$width.'x'.$height.'_'.basename($path);  // location on server
	
	    if (file_exists($cachefile)) 
	    {
	      	$csize = getimagesize($cachefile);
	      	$cached = ($csize[0] == $width && $csize[1] == $height); // image is cached
	      	if (@filemtime($cachefile) < @filemtime($url)) // check if up to date
	      		$cached = false;
	    } 
	    else 
	    {
	      $cached = false;
	    }
	
	    if (!$cached) 
	    {
	      	$resize = ($size[0] > $width || $size[1] > $height) || ($size[0] < $width || $size[1] < $height);
	    } 
	    else 
	    {
	      	$resize = false;
	    }
	
	    if ($resize) 
	    {
	      	$image = new Imagick($url);

	      	$image->cropThumbnailImage($width,$height); // Crop image and thumb

			$image->writeImage($cachefile);
			
	    } 
	    elseif (!$cached) 
	    {
	      copy($url, $cachefile);
	    }
	
	   	return $this->Html->image( $relfile, $htmlAttributes);
		
	}
	
	function imResize($path, $width, $height, $proportionate  = true,$htmlAttributes = array(), $return = false)
	{
		$types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); // used to determine image type
	    if(empty($htmlAttributes['alt'])) $htmlAttributes['alt'] = 'thumb';  // Put alt default
	    
	    $fullpath = ROOT.DS.APP_DIR.DS.WWW_ROOT.DS.'img'.DS;
	    $url = $fullpath.$path;
	    
	    if (!($size = getimagesize($url))) 
	      	return; // image doesn't exist 
	      	
		if ($proportionate) 
	    { 
	    	if ($width == 0) $factor = $height/$size[1];
            elseif ($height == 0) $factor = $width/$size[0];
            else $factor = min ( $width / $size[0], $height / $size[1]);  
           
			$width = round ($size[0] * $factor);
            $height = round ($size[1] * $factor);

        }
        else 
        {
           
			$width = ( $width <= 0 ) ? $size[0] : $width;
            $height = ( $height <= 0 ) ? $size[1] : $height;
	    }	

	    $relfile = $this->request->webroot.DS.'img'.'/'.$this->cacheDir.'/'.$width.'x'.$height.'_'.basename($path); // relative file
	    $cachefile = $fullpath.$this->cacheDir.DS.$width.'x'.$height.'_'.basename($path);  // location on server
	
	    if (file_exists($cachefile)) 
	    {
	      	$csize = getimagesize($cachefile);
	      	$cached = ($csize[0] == $width && $csize[1] == $height); // image is cached
	      	if (@filemtime($cachefile) < @filemtime($url)) // check if up to date
	      		$cached = false;
	    } 
	    else 
	    {
	      $cached = false;
	    }
	
	    if (!$cached) 
	    {
	      	$resize = ($size[0] > $width || $size[1] > $height) || ($size[0] < $width || $size[1] < $height);
	    } 
	    else 
	    {
	      	$resize = false;
	    }
	
	    if ($resize) 
	    {   
	      	$image = new Imagick($url);

	      	$image->resizeImage($width,$height,Imagick::FILTER_LANCZOS,1);

			$image->writeImage($cachefile);
			
	    } 
	    elseif (!$cached) 
	    {
	      copy($url, $cachefile);
	    }
	
	   	return $this->Html->image( $relfile, $htmlAttributes);
		
	}
	
	function uplUtil($path, $width, $height, $htmlAttributes = array(), $return = false)
	{
		$types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); // used to determine image type
	    if(empty($htmlAttributes['alt'])) $htmlAttributes['alt'] = 'thumb';  // Put alt default
	    
	    $fullpath = TMP;
	    $url = $fullpath.$path;
	    
	    if (!($size = getimagesize($url))) 
	      	return; // image doesn't exist 
	    
 		$fp = WWW_ROOT.'img'.DS;
	    $relfile = $this->request->webroot.DS.'img'.'/'.$this->cacheDir.'/'.$width.'x'.$height.'_'.basename($path); // relative file
	    $cachefile = $fp.$this->cacheDir.DS.$width.'x'.$height.'_'.basename($path);  // location on server
	
	    if (file_exists($cachefile)) 
	    {
	      	$csize = getimagesize($cachefile);
	      	$cached = ($csize[0] == $width && $csize[1] == $height); // image is cached
	      	if (@filemtime($cachefile) < @filemtime($url)) // check if up to date
	      		$cached = false;
	    } 
	    else 
	    {
	      $cached = false;
	    }
	
	    if (!$cached) 
	    {
	      	$resize = ($size[0] > $width || $size[1] > $height) || ($size[0] < $width || $size[1] < $height);
	    } 
	    else 
	    {
	      	$resize = false;
	    }
	
	    if ($resize) 
	    {
	      	$image = new Imagick($url);

	      	$image->cropThumbnailImage($width,$height); // Crop image and thumb

			$image->writeImage($cachefile);
			
	    } 
	    elseif (!$cached) 
	    {
	      copy($url, $cachefile);
	    }
	   	return $this->Html->image( $relfile, $htmlAttributes);
		
	}
	
}	
?> 