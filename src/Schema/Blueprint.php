<?php

namespace Grimzy\LaravelMysqlSpatial\Schema;

use Illuminate\Database\Schema\Blueprint as IlluminateBlueprint;
use Illuminate\Support\Fluent;

class Blueprint extends IlluminateBlueprint
{
    /**
     * Add a point column on the table.
     *
     * @param string   $column
     * @param null|int $srid
     */
    public function point($column, $srid = null): Fluent
    {
        return $this->addColumn('point', $column, compact('srid'));
    }

    /**
     * Add a linestring column on the table.
     *
     * @param string   $column
     * @param null|int $srid
     */
    public function lineString($column, $srid = null): Fluent
    {
        return $this->addColumn('linestring', $column, compact('srid'));
    }

    /**
     * Add a polygon column on the table.
     *
     * @param string   $column
     * @param null|int $srid
     */
    public function polygon($column, $srid = null): Fluent
    {
        return $this->addColumn('polygon', $column, compact('srid'));
    }

    /**
     * Add a multipoint column on the table.
     *
     * @param string   $column
     * @param null|int $srid
     */
    public function multiPoint($column, $srid = null): Fluent
    {
        return $this->addColumn('multipoint', $column, compact('srid'));
    }

    /**
     * Add a multilinestring column on the table.
     *
     * @param string   $column
     * @param null|int $srid
     */
    public function multiLineString($column, $srid = null): Fluent
    {
        return $this->addColumn('multilinestring', $column, compact('srid'));
    }

    /**
     * Add a multipolygon column on the table.
     *
     * @param string   $column
     * @param null|int $srid
     */
    public function multiPolygon($column, $srid = null): Fluent
    {
        return $this->addColumn('multipolygon', $column, compact('srid'));
    }

    /**
     * Add a geometrycollection column on the table.
     *
     * @param string   $column
     * @param null|int $srid
     */
    public function geometryCollection($column, $srid = null): Fluent
    {
        return $this->addColumn('geometrycollection', $column, compact('srid'));
    }
}
