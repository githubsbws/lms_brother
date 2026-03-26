<?php

namespace App\Helpers;

use App\Models\Orgchart;

class OrgchartHelper
{
    public static function getAllChildren($orgchartId)
    {
        $result = [];
        self::findChildren($orgchartId, $result);
        return $result;
    }


    private static function findChildren($id, &$result)
    {
        $result[] = $id;

        $children = Orgchart::where('parent_id', $id)->pluck('id')->toArray();

        foreach ($children as $childId) {
            self::findChildren($childId, $result);
        }
    }
}