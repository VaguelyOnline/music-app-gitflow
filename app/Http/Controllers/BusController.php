<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusController extends Controller
{
    // fake DB stub. The index of the item in the array will serve as an 'id' for the item.
    private $buses = [
        '#19 Aldersham road', // 0
        '#23 Newport road',   // 1
        '#30x Newport express'// 2
    ];

    public function showForm() {
        return view('bus.form');
    }

    public function showInfo(Request $request) {
        $name = $request['name'];

        $message = "Hello there: $name";

        return view('bus-result', compact('name', 'message'));
    }

    /**
     * List an index of all bus routes
     */
    public function index() {
        $buses = $this->buses;
        return view('bus.index', compact('buses'));
    }

    /**
     * Show details for a particular bus
     */
    public function show($id) {

        // pretend database lookup
        $bus = $this->buses[$id];

        return view('bus.show', compact('bus', 'id'));
    }
}
