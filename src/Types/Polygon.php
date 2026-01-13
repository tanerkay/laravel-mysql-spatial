<?php

namespace Grimzy\LaravelMysqlSpatial\Types;

use GeoJson\GeoJson;
use GeoJson\Geometry\LinearRing;
use GeoJson\Geometry\Polygon as GeoJsonPolygon;
use Grimzy\LaravelMysqlSpatial\Exceptions\InvalidGeoJsonException;
use ReturnTypeWillChange;

class Polygon extends MultiLineString
{
    public function toWKT(): string
    {
        return sprintf('POLYGON(%s)', (string) $this);
    }

    public static function fromJson($geoJson): self
    {
        if (is_string($geoJson)) {
            $geoJson = GeoJson::jsonUnserialize(json_decode($geoJson));
        }

        if (!is_a($geoJson, GeoJsonPolygon::class)) {
            throw new InvalidGeoJsonException('Expected '.GeoJsonPolygon::class.', got '.get_class($geoJson));
        }

        $set = [];
        foreach ($geoJson->getCoordinates() as $coordinates) {
            $points = [];
            foreach ($coordinates as $coordinate) {
                $points[] = new Point($coordinate[1], $coordinate[0]);
            }
            $set[] = new LineString($points);
        }

        return new self($set);
    }

    /**
     * Convert to GeoJson Polygon that is json-able to GeoJSON.
     */
    #[ReturnTypeWillChange]
    public function jsonSerialize(): GeoJsonPolygon
    {
        $linearRings = [];
        foreach ($this->items as $lineString) {
            $linearRings[] = new LinearRing($lineString->jsonSerialize()->getCoordinates());
        }

        return new GeoJsonPolygon($linearRings);
    }
}
