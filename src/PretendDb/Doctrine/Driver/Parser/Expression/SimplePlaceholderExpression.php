<?php
/**
 * @author: Eugene Lazarchik
 * @date: 2/18/17
 */

namespace PretendDb\Doctrine\Driver\Parser\Expression;


class SimplePlaceholderExpression implements ExpressionInterface
{
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
        return "?";
    }
}
