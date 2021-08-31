<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Price;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Invoice;
use Stripe\Refund;
use Stripe\Subscription;
use Illuminate\Support\Facades\DB;
class PaymentController extends Controller
{
    //
    public function CancelSubscription(Request $request){
        $result = DB::table('users')
        ->where('id', $request['user_id'])
        ->update(['active' => 'off']);

        $result = DB::table('tbl_profile')
        ->where('user_id', $request['user_id'])
        ->update(['collab_status' => 'off']);

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        // get active subscription
        $subscription = Subscription::retrieve($request['subscription']);

        
        if($request['expired_day'] < 8){
            // sample prorated invoice for a subscription with quantity of 0
            $sample_subscription_item = array(
                "id"       => $subscription->items->data[0]->id,
                "plan"     => $subscription->items->data[0]->plan->id,
                "quantity" => 0,
            );

            $upcoming_prorated_invoice = Invoice::upcoming([
                "customer"                    => $subscription->customer,
                "subscription"                => $subscription->id,
                "subscription_items"          => array($sample_subscription_item),
            ]);

            // find prorated amount
            $prorated_amount = 0;
            foreach($upcoming_prorated_invoice->lines->data as $invoice) {
                if ($invoice->type == "invoiceitem") {
                    $prorated_amount = ($invoice->amount < 0) ? abs($invoice->amount) : 0;
                    break;
                }
            }

            // find charge id on the active subscription's last invoice
            $latest_invoice = Invoice::retrieve($subscription->latest_invoice);
            $latest_charge_id = $latest_invoice->charge;

            // refund amount from last invoice charge
            if ($prorated_amount > 0) {
                $refund = Refund::create([
                    'charge' => $latest_charge_id,
                    'amount' => $prorated_amount,
                ]);
            }

            // delete subscription
            $subscription->delete();
        }else{
            // delete subscription
            $subscription->delete();
        }
        echo json_encode('success');
    }
}
