<?php

namespace PretendDb\Doctrine\Driver\Parser\Expression;


use PretendDb\Doctrine\Driver\Expression\EvaluationContext;

class TableFieldExpression implements ExpressionInterface
{
    /** @var string|null */
    protected $databaseName;
    
    /** @var string|null */
    protected $tableName;
    
    /** @var string */
    protected $fieldName;

    public function __construct(string $fieldName, ?string $tableName, ?string $databaseName)
    {
        $this->fieldName = $fieldName;
        $this->tableName = $tableName;
        $this->databaseName = $databaseName;
    }

    public function evaluate(EvaluationContext $evaluationContext)
    {
        return $evaluationContext->getFieldValue($this->fieldName, $this->tableName, $this->databaseName);
    }

    public function dump(string $indentationString = ""): string
    {
        return
            (null === $this->databaseName ? "" : $this->databaseName.".")
            .(null === $this->tableName ? "" : $this->tableName.".")
            .$this->fieldName;
    }
}
