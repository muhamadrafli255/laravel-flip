<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class FlipController extends Controller
{
    public function createBill(Request $request)
    {
        $ch = curl_init();
        $secret_key = "JDJ5JDEzJGI2YmQzWFE5elk4N3hhc3FBVDc4L2U0S1hrM05kZzc5dmF0L3JBRlFxeG5EZ3pTelZKN2RD";

        curl_setopt($ch, CURLOPT_URL, "https://bigflip.id/big_sandbox_api/v2/pwf/bill");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        $payloads = [
            "title" => $request->title,
            "amount" => $request->amount,
            "type" => $request->type,
            "expired_date" => $request->expired_date,
            "redirect_url" => $request->redirect_url,
            "is_address_required" => 0,
            "is_phone_number_required" => 0
        ];

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payloads));

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/x-www-form-urlencoded"
        ));

        curl_setopt($ch, CURLOPT_USERPWD, $secret_key.":");

        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);
        Transaction::create([
            'product_id' => $request->id,
            'status'     => $data['status'],
            'url'        => "https://".$data['link_url'],
        ]);
        return redirect('/transaction');
    }
}
