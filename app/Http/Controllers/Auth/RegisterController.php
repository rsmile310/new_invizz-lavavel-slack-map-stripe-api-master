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
            try {
                /** Add customer to stripe, Stripe customer */
                $customer = Customer::create([
                    'email'     => request('email'),
                    'source'    => request('stripeToken')
                ]);
            } catch (Exception $e) {
                $apiError = $e->getMessage();
            }
            if (empty($apiError) && $customer) {
                /** Charge a credit or a debit card */
                try {
                    /** Stripe charge class */

                    $price = Price::create([
                        'nickname' => 'Standard Monthly',
                        'product' => env('MONTHLY_PRODUCT_ID'),
                        'unit_amount' => $m_amount,
                        'currency' => $currency,
                        'recurring' => [
                            'interval' => 'month',
                            'usage_type' => 'licensed',
                        ],
                    ]);

                    $subscription = Subscription::create([
                        'customer' => $customer->id,
                        'items' => [[
                            'price' => $price->id,
                        ]],
                    ]);

                } catch (Exception $e) {
                    $apiError = $e->getMessage();
                }
            }

        }else if($membership == 'annual'){
            try {
                /** Add customer to stripe, Stripe customer */
                $customer = Customer::create([
                    'email'     => request('email'),
                    'source'    => request('stripeToken')
                ]);
            } catch (Exception $e) {
                $apiError = $e->getMessage();
            }
            if (empty($apiError) && $customer) {
                /** Charge a credit or a debit card */
                try {
                    /** Stripe charge class */

                    $price = Price::create([
                        'nickname' => 'Standard Monthly',
                        'product' => env('ANNUAL_PRODUCT_ID'),
                        'unit_amount' => $y_amount,
                        'currency' => $currency,
                        'recurring' => [
                            'interval' => 'month',
                            'usage_type' => 'licensed',
                        ],
                    ]);

                    $subscription = Subscription::create([
                        'customer' => $customer->id,
                        'items' => [[
                            'price' => $price->id,
                        ]],
                    ]);

                } catch (Exception $e) {
                    $apiError = $e->getMessage();
                }
            }
        }

        $subscription_id = $subscription->id;
        $user = User::create([
            'card_number' => 'VISA ****4242',
            'subscription' => $subscription_id,
            'membership_type' => $data['membership_type'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        $auth = base64_encode($data['email']);
        $verify_link = $actual_link."/auth/".$auth;

        $input = ['message' => $verify_link, 'subject' => 'Email Verification'];
    
        Mail::to($data['email'])->send(new sendGrid($input));

        $verify_email = $data['email'];
        
        $data = DB::select('select id from users where email = ?',[$data['email']]);
        $data = DB::table('users')
        ->where('email', $verify_email)
        ->get()->first();

        $user_id = $data->id;
        $profile = DB::table('tbl_profile')->insert(
            array('user_id' => $user_id)
        );

        return $user;
    }
}
