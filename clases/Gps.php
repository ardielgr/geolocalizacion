<?php
class Gps {
    public static function getGps($exifCoord, $hemi) {
        $degrees = count($exifCoord) > 0 ? self::gps2Num($exifCoord[0]) : 0;
        $minutes = count($exifCoord) > 1 ? self::gps2Num($exifCoord[1]) : 0;
        $seconds = count($exifCoord) > 2 ? self::gps2Num($exifCoord[2]) : 0;
        $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1;

        return $flip * ($degrees + $minutes / 60 + $seconds / 3600);
    }
    
    private static function gps2Num($coordPart) {
        $parts = explode('/', $coordPart);
        if (count($parts) <= 0){
            return 0;
        }
        if (count($parts) == 1){
            return $parts[0];
        }
        return floatval($parts[0]) / floatval($parts[1]);
    }
}
