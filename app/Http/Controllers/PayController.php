<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function Pay(){
        $user = Pay::first();

$user->deposit(10);

$user->deposit(10, ['payable for'=>'Shoes Order']);

$user->deposit(10,0);

$user->withdraw(10);

$user->balance;

$user->wallet->refreshBalance();

$transaction = $user->deposit(100, null, false);
$transaction->confirmed;
$user->balance;

$user->confirm($transaction);
$transaction->confirmed;
    }
}
