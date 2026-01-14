<?php

namespace Grimzy\LaravelMysqlSpatial;

use Grimzy\LaravelMysqlSpatial\Schema\Builder;
use Grimzy\LaravelMysqlSpatial\Schema\Grammars\MySqlGrammar as SchemaGrammar;
use Illuminate\Database\Grammar;
use Illuminate\Database\MySqlConnection as IlluminateMySqlConnection;

class MysqlConnection extends IlluminateMySqlConnection
{
    /**
     * Get the default schema grammar instance.
     */
    protected function getDefaultSchemaGrammar(): Grammar
    {
        return new SchemaGrammar($this);
    }

    /**
     * Get a schema builder instance for the connection.
     */
    public function getSchemaBuilder(): Builder
    {
        if (is_null($this->schemaGrammar)) {
            $this->useDefaultSchemaGrammar();
        }

        return new Builder($this);
    }
}
