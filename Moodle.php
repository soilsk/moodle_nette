<?php

/**
 * Moodle
 * -----------
 * Moodle plugin for Nette
 * Add/remove users, enroll to course, feedback from quiz mod.
 *
 * @author     Lubos Hatar
 * @copyright  Copyright (c) 2015 Lubos Hatar
 * @license    LGPL
 * @link       ?
 */

namespace Moodle;

use Nette\Object;
use Nette\Utils\Strings;
use Nette\Callback;

class Moodle extends Object {

  /** @var string */ 
  private $siteUrl; 
  
  /** @var string */ 
  private $siteToken; 
    
  /**
	 * @param  string $siteToken
	 * @param  string $siteURL
	 */

  public function __construct($siteUrl, $siteToken) {
  
    $this->siteUrl = $siteUrl;
    $this->siteToken = $siteToken;
  }

  public function testa() {
    
    return $this->siteUrl." ==> ".$this->siteToken;
  }
  
}