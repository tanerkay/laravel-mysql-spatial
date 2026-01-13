<?php

namespace Grimzy\LaravelMysqlSpatial\Types;

interface GeometryInterface
{
    public function toWKT(): string;

    public static function fromWKT($wkt, $srid = 0): static;

    public function __toString();

    public static function fromString($wktArgument, $srid = 0): static;

    public static function fromJson($geoJson): self;
}
