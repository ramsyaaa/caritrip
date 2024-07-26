<?php
namespace App\Helpers;

class SortPackageHelper
{
    public static function sortTripsByPriority(array $trips)
    {
        $priorities = ['Classic', 'Silver', 'Gold', 'Platinum'];

        usort($trips, function ($a, $b) use ($priorities) {
            $nameA = $a['package_name'];
            $nameB = $b['package_name'];

            $priorityA = self::getPriority($nameA, $priorities);
            $priorityB = self::getPriority($nameB, $priorities);

            if ($priorityA === $priorityB) {
                return strcasecmp($nameA, $nameB);
            }

            return $priorityA - $priorityB;
        });

        return $trips;
    }

    public static function getPriority($name, $priorities)
    {
        foreach ($priorities as $index => $priority) {
            if (stripos($name, $priority) === 0) {
                return $index;
            }
        }
        return count($priorities);
    }
}

