<?php
/**
 * @author: Eugene Lazarchik
 * @date: 7/7/16
 */

namespace PretendDb\Doctrine\Driver;

use Doctrine\DBAL\Driver\Connection;
use PretendDb\Doctrine\Driver\Parser\Parser;

class MySQLConnection implements Connection
{
    /** @var MySQLStorage */
    protected $storage;
    
    /** @var Parser */
    protected $parser;

    /**
     * @param MySQLStorage $storage
     * @param Parser $parser
     */
    public function __construct($storage, $parser)
    {
        $this->storage = $storage;
        $this->parser = $parser;
    }
    
    public function prepare($prepareString)
    {
        return new MySQLStatement($this->storage, $prepareString, $this->parser);
    }
    
    public function query($queryString)
    {
        return new MySQLStatement($this->storage, $queryString, $this->parser);
    }
    
    public function quote($input, $type=\PDO::PARAM_STR)
    {
        throw new \RuntimeException("Not implemented yet");
    }
    
    public function exec($statement)
    {
        throw new \RuntimeException("Not implemented yet");
    }
    
    public function lastInsertId($name = null)
    {
        throw new \RuntimeException("Not implemented yet");
    }
    
    public function beginTransaction()
    {
        // @FIXME: implement this
    }
    
    public function commit()
    {
        // @FIXME: implement this
    }
    
    public function rollBack()
    {
        // @FIXME: implement this
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
