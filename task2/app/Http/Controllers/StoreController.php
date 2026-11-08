<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function home()
    {
        $toys = $this->toyList();

        return view('pages.home', [
            'ageGroups'   => $this->ageGroups(),
            'discounted'  => array_values(array_filter($toys, fn ($toy) => $toy['has_discount'])),
            'newArrivals' => $toys,
        ]);
    }

    public function categories()
    {
        return view('pages.categories', [
            'categories' => $this->categoriesWithCount(),
            'ageGroups'  => $this->ageGroups(),
        ]);
    }

    public function toys(Request $request)
    {
        $toys     = $this->toyList();
        $category = $request->query('category');
        $isOffers = $request->query('offers') === '1';

        if ($category) {
            $toys = array_filter($toys, fn ($toy) => $toy['category_slug'] === $category);
        }

        if ($isOffers) {
            $toys = array_filter($toys, fn ($toy) => $toy['has_discount']);
        }

        return view('pages.toys', [
            'toys'       => array_values($toys),
            'categories' => $this->categoriesWithCount(),
            'ageGroups'  => $this->ageGroups(),
            'isOffers'   => $isOffers,
            'selected'   => $category,
        ]);
    }

    public function cart()
    {
        $toys = $this->toyList();

        $items = [
            ['toy' => $toys[0], 'quantity' => 1],
            ['toy' => $toys[4], 'quantity' => 2],
        ];

        $subtotal = array_sum(array_map(
            fn ($item) => $item['toy']['final_price'] * $item['quantity'],
            $items
        ));

        return view('pages.cart', [
            'items'       => $items,
            'subtotal'    => $subtotal,
            'suggestions' => array_slice($toys, 6, 4),
        ]);
    }


    private function ageGroups(): array
    {
        return [
            ['slug' => 'infants',     'name' => 'Infants',     'min_age' => 0,  'max_age' => 1],
            ['slug' => 'toddlers',    'name' => 'Toddlers',    'min_age' => 1,  'max_age' => 3],
            ['slug' => 'little-kids', 'name' => 'Little Kids', 'min_age' => 4,  'max_age' => 7],
            ['slug' => 'kids',        'name' => 'Kids',        'min_age' => 7,  'max_age' => 10],
            ['slug' => 'teens',       'name' => 'Teens',       'min_age' => 10, 'max_age' => 16],
        ];
    }

    private function categoryList(): array
    {
        return [
            ['id' => 20, 'name' => 'Educational Toys',       'slug' => 'educational-toys',     'image' => 'uploads/categories/educational-toys.jpg'],
            ['id' => 21, 'name' => 'Wooden Toys',            'slug' => 'wooden-toys',          'image' => 'uploads/categories/wooden-toys.jpg'],
            ['id' => 22, 'name' => 'Plush & Soft Toys',      'slug' => 'plush-soft-toys',      'image' => 'uploads/categories/plush-soft-toys.jpg'],
            ['id' => 23, 'name' => 'Active Play & Ride-ons', 'slug' => 'active-play-ride-ons', 'image' => 'uploads/categories/active-play-ride-ons.jpg'],
        ];
    }

    private function categoriesWithCount(): array
    {
        $toys = $this->toyList();

        return array_map(function ($category) use ($toys) {
            $category['toy_count'] = count(array_filter(
                $toys,
                fn ($toy) => $toy['category_slug'] === $category['slug']
            ));

            return $category;
        }, $this->categoryList());
    }

    private function toyList(): array
    {
        $raw = [
            [20,  20, 'Wooden Alphabet & Number Puzzle Board', 'Colorful wooden puzzle pieces helping kids learn letters and numbers early.', 18.99, 10, 57, 3, 6,  'educational-toys/wooden-alphabet-and-number-puzzle-board'],
            [21,  20, 'Counting Beads Abacus',                 'Traditional colorful wooden abacus for foundational math practice.',          14.99, 0,  45, 4, 7,  'educational-toys/counting-beads-abacus'],
            [105, 20, 'Junior Explorer Microscope',            'Real-glass kids microscope with LED light and prepared slides.',              32.00, 20, 15, 6, 12, 'educational-toys/junior-explorer-microscope'],
            [106, 20, 'Young Astronomer Telescope',            'Easy-to-use refractor telescope with tripod and two eyepieces.',              45.00, 0,  10, 6, 12, 'educational-toys/young-astronomer-telescope'],
            [30,  21, 'Stacking Wooden Rainbow Rings',         'Classic montessori wooden stacking rings for color recognition.',             22.00, 0,  30, 1, 3,  'wooden-toys/stacking-wooden-rainbow-rings'],
            [32,  21, 'Classic Wooden Train Set',              'Connecting wooden train cars and tracks for building railways.',              32.99, 0,  20, 3, 7,  'wooden-toys/wooden-train-and-station-set'],
            [33,  21, 'Wooden Pull Along Duck',                'Cute duck on wheels that waddles when pulled by its string.',                 13.99, 0,  29, 1, 3,  'wooden-toys/wooden-pull-along-duck'],
            [41,  22, 'Fluffy Teddy Bear',                     'Soft hugging plush bear companion for naptime and comfort.',                  18.00, 70, 50, 0, 7,  'plush-soft-toys/fluffy-teddy-bear'],
            [42,  22, 'Musical Lullaby Star Plush',            'Gently glows and plays soothing lullabies when squeezed.',                    22.50, 0,  30, 0, 2,  'plush-soft-toys/musical-lullaby-star-plush'],
            [45,  22, 'Stuffed Bunny with Long Ears',          'Ultra-soft plush rabbit companion made of hypoallergenic materials.',         16.00, 0,  45, 0, 7,  'plush-soft-toys/stuffed-bunny-with-long-ears'],
            [51,  23, '3-Wheel Lean-to-Steer Scooter',         'Stable and safe scooter with flashing LED wheels for young children.',        59.99, 0,  10, 3, 6,  'active-play-ride-ons/3-wheel-lean-to-steer-scooter'],
            [53,  23, 'Toddler Balance Bike',                  'No-pedal training bicycle designed to build balance early.',                  65.00, 0,  12, 2, 5,  'active-play-ride-ons/toddler-balance-bike'],
        ];

        $categories = array_column($this->categoryList(), null, 'id');
        $tints      = ['tint-yellow', 'tint-purple', 'tint-peach', 'tint-pink', 'tint-mint', 'tint-blue'];

        return array_map(function ($row) use ($categories, $tints) {
            [$id, $categoryId, $name, $description, $price, $discount, $stock, $minAge, $maxAge, $image] = $row;

            $finalPrice = $discount > 0 ? round($price * (1 - $discount / 100), 2) : $price;

            return [
                'id'            => $id,
                'name'          => $name,
                'description'   => $description,
                'price'         => $price,
                'discount_pct'  => $discount,
                'final_price'   => $finalPrice,
                'has_discount'  => $finalPrice < $price,
                'stock'         => $stock,
                'min_age'       => $minAge,
                'max_age'       => $maxAge,
                'category_name' => $categories[$categoryId]['name'],
                'category_slug' => $categories[$categoryId]['slug'],
                'tint'          => $tints[$categoryId % count($tints)],
                'images'        => [
                    "assets/images/products/{$image}-1.jpg",
                    "assets/images/products/{$image}-2.jpg",
                ],
            ];
        }, $raw);
    }
}
