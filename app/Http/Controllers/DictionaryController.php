<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    private $dictionary = [

    'a' => [
        'word' => 'Apple',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/1/15/Red_Apple.jpg',
        'definition' => 'Apple is a sweet fruit.'
    ],

    'b' => [
        'word' => 'Ball',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/7/7a/Basketball.png',
        'definition' => 'Ball is used in sports.'
    ],

    'c' => [
        'word' => 'Cat',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/b/b6/Felis_catus-cat_on_snow.jpg',
        'definition' => 'Cat is a domestic animal.'
    ],

    'd' => [
        'word' => 'Dog',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/6/6e/Golde33443.jpg',
        'definition' => 'Dog is a loyal animal.'
    ],

    'e' => [
        'word' => 'Elephant',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/3/37/African_Bush_Elephant.jpg',
        'definition' => 'Elephant is a very large animal.'
    ],

    'f' => [
        'word' => 'Fish',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/2/25/Humpback_anglerfish.png',
        'definition' => 'Fish lives in water.'
    ],

    'g' => [
        'word' => 'Grapes',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/b/bb/Table_grapes_on_white.jpg',
        'definition' => 'Grapes are small sweet fruits.'
    ],

    'h' => [
        'word' => 'House',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/6/6e/Gingerbread_House_Essex_CT.jpg',
        'definition' => 'House is a place where people live.'
    ],

    'i' => [
        'word' => 'Ice Cream',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Culfi_Ice_Cream.jpg',
        'definition' => 'Ice cream is a cold sweet dessert.'
    ],

    'j' => [
        'word' => 'Juice',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/f/fd/Orange_juice_1.jpg',
        'definition' => 'Juice is a drink made from fruits.'
    ],

    'k' => [
        'word' => 'Kite',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/9/96/RokkakuKite.jpg',
        'definition' => 'Kite can fly in the sky.'
    ],

    'l' => [
        'word' => 'Lion',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/7/73/Lion_waiting_in_Namibia.jpg',
        'definition' => 'Lion is known as the king of animals.'
    ],

    'm' => [
        'word' => 'Monkey',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/6/62/Java_Monkey.jpg',
        'definition' => 'Monkey likes climbing trees.'
    ],

    'n' => [
        'word' => 'Nest',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/0/0b/Bird_nest.jpg',
        'definition' => 'Nest is a home for birds.'
    ],

    'o' => [
        'word' => 'Orange',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/c/c4/Orange-Fruit-Pieces.jpg',
        'definition' => 'Orange is a citrus fruit.'
    ],

    'p' => [
        'word' => 'Pen',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/0/0b/Markerpen.jpg',
        'definition' => 'Pen is used for writing.'
    ],

    'q' => [
        'word' => 'Queen',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/3/32/Queen_Elizabeth_II.jpg',
        'definition' => 'Queen is a female ruler.'
    ],

    'r' => [
        'word' => 'Rabbit',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/7/70/Rabbit_in_montana.jpg',
        'definition' => 'Rabbit is a small fast animal.'
    ],

    's' => [
        'word' => 'Sun',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/c/c3/Solar_sys8.jpg',
        'definition' => 'Sun gives light and heat.'
    ],

    't' => [
        'word' => 'Tiger',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/5/56/Tiger.50.jpg',
        'definition' => 'Tiger is a strong wild animal.'
    ],

    'u' => [
        'word' => 'Umbrella',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/3/3f/Red_umbrella.jpg',
        'definition' => 'Umbrella protects from rain.'
    ],

    'v' => [
        'word' => 'Van',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/5/5b/Ford_E-Series_van.jpg',
        'definition' => 'Van is a type of vehicle.'
    ],

    'w' => [
        'word' => 'Watch',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/f/f4/Watch.jpg',
        'definition' => 'Watch is used to tell time.'
    ],

    'x' => [
        'word' => 'Xylophone',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/b/b2/Xylophone.jpg',
        'definition' => 'Xylophone is a musical instrument.'
    ],

    'y' => [
        'word' => 'Yacht',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/6/61/Yacht_in_monaco.jpg',
        'definition' => 'Yacht is a luxury boat.'
    ],

    'z' => [
        'word' => 'Zebra',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/9/96/Plains_Zebra_Equus_quagga_cropped.jpg',
        'definition' => 'Zebra is an animal with black and white stripes.'
    ],

];

    public function index()
    {
        $letters = range('A', 'Z');

        return view('homework1', compact('letters'));
    }

    public function show($letter)
    {
        $letter = strtolower($letter);

        $dictionary = $this->dictionary;

        if (!isset($dictionary[$letter])) {
            abort(404);
        }

        $data = $dictionary[$letter];

        return view('dictionary', compact('letter', 'data'));
    }
}
