# CliquePHP

Clique is an experimental microframework for building CLI apps in PHP.

While Clique is very much in development and not suitable for production projects,
it aims to simplify building complex CLI apps in PHP.

## Features
Currently, not a lot is implemented.

Current features:
 * Command execution handling and routing

Hopefully, coming in the future:
  * Exception handling
  * Daemonization
  * Support for nicer output
  * Automatic help generation
  * Automatic version management

## Documentation

### Basic usage principles

A Clique app relies on Composer to autoload all Commands and Classes.

When you run a Clique app (by execution ./app.php, for instance):
 * Clique autoloads all Commands
 * if a Command exists, it runs it
 * if a Command doesn't exist, it runs:
  * the UnknownCommand Command, if it exists
  * else, it throws an Exception
* if a Command is not set, it runs:
  * the DryRun Command, if it exists
  * else, the Help Command, if it exists
  * else, the UnknownCommand Command, if it exists
  * else, it throws an Exception

To create a Command:
 * create a Class in the Clique\\Commands namespace that extends the Command Class
 * have a public method named 'run' in your Command (this runs upon Command execution)
 * define the CLI command to run your Command in app/Routes.php
   * for instance, if you want ./app.php queue to execute the HandleQueue command,
   add it as "queue" => "HandleQueue" to the Commands array in Routes.php

Useful features:
  * using '$this->ExecutionArguments' in your Command gets you the arguments after your Command
    * for instance, if your command was run with ./app.php commandName param1 param2,
    the array will look like: ["param1", "param2"]

## Development

This is mostly my hobby project, wishing to gain more experience in frameworks.
However, feel free to work on Clique if you wish so! I'd be glad.
