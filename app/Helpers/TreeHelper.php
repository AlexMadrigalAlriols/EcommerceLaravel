<?php

// namespace App\Helpers;

// use Illuminate\Database\Eloquent\Collection;
// use Illuminate\Database\Eloquent\Model;

// class TreeHelper
// {
//     public static function getItemsOpened(
//         Collection $items,
//         string $property_parent_id = 'parent_id',
//         string $property_parent = 'parent',
//         bool $get_real_info = true
//     ): array {
//         $items_opened = [];

//         if ($get_real_info) {
//             foreach ($items as $item) {
//                 foreach (self::getParentItemsIds($item, $property_parent_id, $property_parent) as $parent_id) {
//                     $items_opened[] = $parent_id;
//                 }
//             }
//         } else {
//             $items_opened = [1];
//         }

//         return array_unique($items_opened);
//     }


//     public static function getParentItemsIds(
//         Model $item,
//         string $property_parent_id = 'parent_id',
//         string $property_parent = 'parent'
//     ): array {
//         if ($item->$property_parent_id) {
//             $categories_opened[] = $item->$property_parent_id;
//             return array_merge(
//                 $categories_opened,
//                 self::getParentItemsIds(
//                     $item->$property_parent,
//                     $property_parent_id,
//                     $property_parent
//                 )
//             );
//         }

//         return [];
//     }
// }
