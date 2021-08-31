<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Profile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\sendGrid;

use Exception;
use App\Payment;
use Stripe\Charge;
use Stripe\Price;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Subscription;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        echo "<script>console.log('sdfasdf')</script>";
        return Validator::make($data, [
            // 'new_card_number' => ['required', 'string', 'max:255'],
            'membership_type' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        /** I have hard coded amount. You may fetch the amount based on customers order or anything */

        $m_amount     = 6 * 100;
        $y_amount     = 30 * 100;
        $currency   = 'usd';

        if (empty(request()->get('stripeToken'))) {
            session()->flash('error', 'Some error while making the payment. Please try again');
            return back()->withInput();
        }

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        // dd(env('ANNUAL_PRODUCT_ID'));

        $membership = $data['membership_type'];

        if($membership == 'monthly'){
            // $price = Price::create([
            //     'nickname' => 'Monthly Plan',
            //     'product' => env('MONTHLY_PRODUCT_ID'),
            //     'unit_amount' => $m_amount,
            //     'currency' => $currency,
            //     // 'recurring' => [
            //     //     'interval' => 'day',
            //     //     // 'usage_type' => 'licensed',
            //     // ],
            // ]);

            // $customer = Customer::create([
            //     'email' => $data['email'],
            //     'payment_method' => 'pm_card_visa',
            //     'invoice_settings' => [
            //         'default_payment_method' => 'pm_card_visa',
            //     ],
            // ]);


            try {
                /** Add customer to stripe, Stripe customer */
                $customer = Customer::create([
                    'email'     => request('email'),
                    'source'    => request('stripeToken')
                ]);
            } catch (Exception $e) {
                $apiError = $e->getMessage();
            }

            $subscription = Subscription::create([
                'customer' => $customer->id,
                'items' => [[
                  'price' => 'price_1IDhPnH3N3r89kEs0NDPNCcB',
                ]],
                // 'add_invoice_items' => [[
                //   'price' => $price->id,
                // ]],
            ]);
            dd($customer);
            
            //price_1IDhMXH3N3r89kEsqqX1boQe
            // $paymentDetails = $price->jsonSerialize();

        }else if($membership == 'annual'){
            // $price = Price::create([
            //     'nickname' => 'Yearly Plan',
            //     'product' => env('ANNUAL_PRODUCT_ID'),
            //     'unit_amount' => $y_amount,
            //     'currency' => 'usd',
            //     // 'recurring' => [
            //     //     'interval' => 'month',
            //     //     // 'usage_type' => 'licensed',
            //     // ],
            // ]);

            // $customer = Customer::create([
            //     'email' => $data['email'],
            //     'payment_method' => 'pm_card_visa',
            //     'invoice_settings' => [
            //         'default_payment_method' => 'pm_card_visa',
            //     ],
            // ]);

            // $customer = Customer::create([
            //     'email'     => request('email'),
            //     'source'    => request('stripeToken')
            // ]);

            // dd($price->recurring->interval);

            // $subscription = Subscription::create([
            //     'customer' => $customer->id,
            //     'items' => [[
            //       'price' => 'price_1ICshRH3N3r89kEscyrSbd2U',
            //     ]],
            //     // 'add_invoice_items' => [[
            //     //   'price' => $price->id,
            //     // ]],
            // ]);

            //price_1ICshRH3N3r89kEscyrSbd2U
            // $paymentDetails = $price->jsonSerialize();
        }

        // try {
        //     /** Add customer to stripe, Stripe customer */
        //     $customer = Customer::create([
        //         'email'     => request('email'),
        //         'source'    => request('stripeToken')
        //     ]);
        // } catch (Exception $e) {
        //     $apiError = $e->getMessage();
        // }


        // // dd(env('ANNUAL_PRODUCT_ID'));
        // if (empty($apiError) && $customer) {
        //     /** Charge a credit or a debit card */
        //     try {
        //         /** Stripe charge class */

        //         $charge = Charge::create(array(
        //             'customer'      => $customer->id,
        //             'amount'        => $amount,
        //             'currency'      => $currency,
        //             'description'   => 'Some testing description'
        //         ));

        //         // $charge = Price::create([
        //         //     'nickname' => 'Standard Yearly',
        //         //     'product' => env('ANNUAL_PRODUCT_ID'),
        //         //     'unit_amount' => 22000,
        //         //     'currency' => 'usd',
        //         //     'recurring' => [
        //         //       'interval' => 'year',
        //         //       'usage_type' => 'licensed',
        //         //     ],
        //         //   ]);
        //     } catch (Exception $e) {
        //         $apiError = $e->getMessage();
        //     }



        //     if (empty($apiError) && $charge) {
        //         // Retrieve charge details 
        //         $paymentDetails = $charge->jsonSerialize();

        //         if ($paymentDetails['amount_refunded'] == 0 && empty($paymentDetails['failure_code']) && $paymentDetails['paid'] == 1 && $paymentDetails['captured'] == 1) {
        //             /** You need to create model and other implementations */
        //             /*
        //             Payment::create([
        //                 'name'                          => request('name'),
        //                 'email'                         => request('email'),
        //                 'amount'                        => $paymentDetails['amount'] / 100,
        //                 'currency'                      => $paymentDetails['currency'],
        //                 'transaction_id'                => $paymentDetails['balance_transaction'],
        //                 'payment_status'                => $paymentDetails['status'],
        //                 'receipt_url'                   => $paymentDetails['receipt_url'],
        //                 'transaction_complete_details'  => json_encode($paymentDetails)
        //             ]);
        //             */
        //             // $user = User::create([
        //             //     'card_number' => 'sss',
        //             //     'membership_type' => $data['membership_type'],
        //             //     'email' => $data['email'],
        //             //     'password' => Hash::make($data['password']),
        //             // ]);

        //             // return redirect('/?receipt_url=' . $paymentDetails['receipt_url']);

        //         } else {
        //             session()->flash('error', 'Transaction failed');
        //             return back()->withInput();
                    
        //         }


        //     } else {
        //         session()->flash('error', 'Error in capturing amount: ' . $apiError);
        //         return back()->withInput();
        //     }
        // } else {
        //     session()->flash('error', 'Invalid card details: ' . $apiError);
        //     return back()->withInput();
        // }


        
        $user = User::create([
            'card_number' => 'VISA ****4242',
            'membership_type' => $data['membership_type'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


        // $auth = base64_encode($data['email']);
        // $verify_link = "http://54.237.136.251/auth/".$auth;

        // $input = ['message' => $verify_link, 'subject' => 'Email Verification'];
    
        // Mail::to($data['email'])->send(new sendGrid($input));

        $verify_email = $data['email'];
        
        $data = DB::select('select id from users where email = ?',[$data['email']]);
        $data = DB::table('users')
        ->where('email', $verify_email)
        ->get()->first();

        $user_id = $data->id;
        $profile = DB::table('tbl_profile')->insert(
            array('user_id' => $user_id)
        );

        
        // return view('emails.emailVerify', compact('email'));
        // view('emails.emailVerify')->with(['email'=>$verify_email]);

        return $user;
    }
}
