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
     * Constructor
     * 
     * @param string $logfile Optional path to log file
     * @return void  
     * @access public
     */
	public function __construct($logfile='application.log') 
	{
		$this->file = fopen($logfile, 'a');
		if (!defined('_LOG_LEVEL_')) {

    /**
     * Define the log level if its not set
     */
			define('_LOG_LEVEL_', 3);
		}
	}

    /**
     * Close the file when your done
     * 
     * @return void  
     * @access public
     */
	public function __destruct()
	{
		fclose($this->file);
	}

    /**
     * Used to add date/time to log entries
     * 
     * @return string  Return Current date/time
     * @access private
     */
	private function _currentDateTime()
	{
		return date('Y-m-d H:i:s');
	}

    /**
     * Does the actual writing
     * 
     * @param string $message Message to log
     * @return void   
     * @access private
     */
	private function _writeLog($message)
	{
		fwrite($this->file, $message);
		fwrite($this->file, "\r\n");
	}

    /**
     * Creates a fatal log entry
     * 
     * @param string $message Message to log
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
     * Creates an info log entry
     * 
     * @param string $message Message to log
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
     * Creates a debug log entry
     * 
     * @param string $message Message to log
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
