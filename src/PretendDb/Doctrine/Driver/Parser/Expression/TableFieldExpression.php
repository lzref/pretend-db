<?php
/**
 * @author: Eugene Lazarchik
 * @date: 2/18/17
 */

namespace PretendDb\Doctrine\Driver\Parser\Expression;


class TableFieldExpression implements ExpressionInterface
{
    /** @var string|null */
    protected $databaseName;
    
    /** @var string|null */
    protected $tableName;
    
    /** @var string */
    protected $fieldName;

    /**
     * @param string $fieldName
     * @param string|null $tableName
     * @param string|null $databaseName
     */
    public function __construct($fieldName, $tableName, $databaseName)
    {
        $this->fieldName = $fieldName;
        $this->tableName = $tableName;
        $this->databaseName = $databaseName;
    }

    public function evaluate()
    {
        // TODO: Implement evaluate() method.
    }

    /**
     * @param string $indentationString
     * @return string
     */
    public function dump($indentationString = "")
    {
        return
            (null === $this->databaseName ? "" : $this->databaseName.".")
            .(null === $this->tableName ? "" : $this->tableName.".")
            .$this->fieldName;
    }
}
