SimpleLogger
============

Simple Logging Class

This is a VERY simple logging class. It is designed to be quick an easy to implement for small projects. 

For more complex projects I recommend, log4php.

In order to configure create a constant to set the logging level:

define('_LOG_LEVEL_', 3);
 0 = No logging
 1 = Fatal
 2 = Info
 3 = Debug
 
 
By default it will create a log file called application.log in the same folder where it was called.

You can pass a path to a log file in the constructor:

$log = new Log ('/some/path/to.log');

Then simply create different log messages:

$log->fatal('The world ended');

Which will create a log entry like:
FATAL:2013-05-15 22:56:39-The world ended

You can also use info and debug.

The way I use it is I create an instance and then pass it to other classes in the constructor:

$foo = new SomeClass($log);

And then assign it to a log property:
$this->log = $log;

Then call log functions like this:
$this->log->fatal('The world ended');
