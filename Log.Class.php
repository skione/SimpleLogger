<?php

/**
 * Simple class for logging PHP applications
 * 
 * @package   Log
 * @author    Michael Sole <michael.sole@soledevelopment.com.com>
 * @copyright 2013 Michael Sole
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   Release: .1
 */
class Log {

    /**
     * File handle of log
     * @var resource
     * @access public 
     */
  public $file;

    /**
     * Short description for function
     * 
     * @param string $logfile Parameter description (if any) ...
     * @return void  
     * @access public
     */
	public function __construct($logfile='application.log') 
	{
		$this->file = fopen($logfile, 'a');
		if (!defined('_LOG_LEVEL_')) {

    /**
     * Description for define
     */
			define('_LOG_LEVEL_', 3);
		}
	}

    /**
     * Short description for function
     * 
     * Long description (if any) ...
     * 
     * @return void  
     * @access public
     */
	public function __destruct()
	{
		fclose($this->file);
	}

    /**
     * Short description for function
     * 
     * Long description (if any) ...
     * 
     * @return string  Return description (if any) ...
     * @access private
     */
	private function _currentDateTime()
	{
		return date('Y-m-d H:i:s');
	}

    /**
     * Short description for function
     * 
     * Long description (if any) ...
     * 
     * @param unknown $message Parameter description (if any) ...
     * @return void   
     * @access private
     */
	private function _writeLog($message)
	{
		fwrite($this->file, $message);
		fwrite($this->file, "\r\n");
	}

    /**
     * Short description for function
     * 
     * Long description (if any) ...
     * 
     * @param string $message Parameter description (if any) ...
     * @return void  
     * @access public
     */
	public function fatal($message)
	{
		if (_LOG_LEVEL_ > 0) {
			$timestamp = $this->_currentDateTime();
			$this->_writeLog('FATAL:'.$timestamp.'-'.$message);
		}
	}

    /**
     * Short description for function
     * 
     * Long description (if any) ...
     * 
     * @param string $message Parameter description (if any) ...
     * @return void  
     * @access public
     */
	public function info($message)
	{
		if (_LOG_LEVEL_ > 1) {
			$timestamp = $this->_currentDateTime();
			$this->_writeLog('INFO:'.$timestamp.'-'.$message);
		}
	}

    /**
     * Short description for function
     * 
     * Long description (if any) ...
     * 
     * @param string $message Parameter description (if any) ...
     * @return void  
     * @access public
     */
	public function debug($message)
	{
		if (_LOG_LEVEL_ > 2) {
			$timestamp = $this->_currentDateTime();
			$this->_writeLog('DEBUG:'.$timestamp.'-'.$message);
		}
	}
}
