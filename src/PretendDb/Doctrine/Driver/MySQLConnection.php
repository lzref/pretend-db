<?php
/**
 * @author: Eugene Lazarchik
 * @date: 7/7/16
 */

namespace PretendDb\Doctrine\Driver;

use Doctrine\DBAL\Driver\Connection;

class MySQLConnection implements Connection
{
    /** @var MySQLServer */
    protected $server;
    
    /** @var int */
    protected $lastInsertId = 0;
    
    /** @var string|null */
    protected $currentDatabaseName;
    
    /**
     * This is mostly for debugging, so that it's printed when we're doing var_dump's
     * @var array
     */
    protected $connectionParams;

    /**
     * @param MySQLServer $server
     * @param string|null $databaseName
     * @param array $connectionParams
     * @internal param Parser $parser
     */
    public function __construct($server, $databaseName, $connectionParams)
    {
        $this->server = $server;
        $this->currentDatabaseName = $databaseName;
        $this->connectionParams = $connectionParams;
    }
    
    /**
     * @param string $currentDatabaseName
     * @throws \InvalidArgumentException
     */
    public function setCurrentDatabaseName($currentDatabaseName)
    {
        if (!$this->server->databaseExists($currentDatabaseName)) {
            throw new \InvalidArgumentException("Can't USE a database that doesn't exist: ".$currentDatabaseName
                .". Existing databases: ".join(", ", array_keys($this->server->getExistingDatabaseNames())));
        }
        
        $this->currentDatabaseName = $currentDatabaseName;
    }

    /**
     * @return string
     */
    public function getCurrentDatabaseName()
    {
        return $this->currentDatabaseName;
    }
    
    public function prepare($prepareString)
    {
        return new MySQLStatement($this->server, $this, $prepareString);
    }
    
    public function query()
    {
        $methodArguments = func_get_args();
        
        /** @var string $queryString */
        $queryString = $methodArguments[0];
        
        $statementObject = new MySQLStatement($this->server, $this, $queryString);
        
        $statementObject->execute();
        
        return $statementObject;
    }
    
    public function quote($input, $type=\PDO::PARAM_STR)
    {
        throw new \RuntimeException("Not implemented yet");
    }
    
    public function exec($statement)
    {
        throw new \RuntimeException("Not implemented yet");
    }

    /**
     * @TODO support $name
     * 
     * @param string|null $name
     * @return int
     */
    public function lastInsertId($name = null)
    {
        return $this->lastInsertId;
    }

    /**
     * @param int $lastInsertId
     */
    public function setLastInsertId($lastInsertId)
    {
        $this->lastInsertId = $lastInsertId;
    }
    
    public function beginTransaction()
    {
        // @TODO implement this
        
        return;
    }
    
    public function commit()
    {
        // @TODO implement this
        
        return;
    }
    
    public function rollBack()
    {
        // @TODO implement this
        
        return;
    }
    
    public function errorCode()
    {
        throw new \RuntimeException("Not implemented yet");
    }
    
    public function errorInfo()
    {
        throw new \RuntimeException("Not implemented yet");
    }
}
