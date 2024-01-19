<?php

namespace App\Livewire\Quote;

use Livewire\Component;
use App\Services\CurlService;
use App\Livewire\Quote\Index as QuoteIndex;
use Livewire\Attributes\Validate;

class Create extends Component
{
    protected $bcCustomerId = 2;
    protected $storeId = '3gch1lz';
    protected $quote = [];
    protected $brand = [];
    protected $category = [];
    protected $groupDiscount = [];

    #[Validate]
    public $title = 'title';
    #[Validate]
    public $content = 'content';
 

    public function boot(CurlService $curl)
    {
        $curlData = [];
        $curlData['headers'] = '';
        $curlData['body'] = [
            'store_id' => $this->storeId,
            'category_id' => env($this->storeId . "_CATEGORY"),
            'users_id' => $this->bcCustomerId,
        ];

        $url = env('APP_API_URL') . 'apibcquotes/create-quote';
        $response = $curl->get($url, $curlData);


        $this->quote = $response['response']['quote_model'];
        $this->brand = $response['response']['brand_setting'];
        $this->category = $response['response']['category'];
        $this->groupDiscount = $response['response']['group_discount'];
    }

    public function render()
    {
        return view('livewire.quote.create',[
            "quote"=>$this->quote,
            "brand"=>$this->brand,
            "category"=>$this->category,
            "groupDiscount"=>$this->groupDiscount,
        ]);
    }

    public function back(){
        $this->redirect(QuoteIndex::class, navigate: true);
    }

    public function rules()
    {
        return [
            'title' => ['required','min:5'],
            'content' => ['required','min:5'],
        ];
    }

    public function messages() 
    {
        return [
            'title.required' => 'The :attribute are missing.',
            'title.min' => 'The :attribute is too short. Atleast 5 characters are required.',
            'content.required' => 'The :attribute are missing.',
            'content.min' => 'The :attribute is too short. Atleast 5 characters are required.',
        ];
    }
 
    
    public function save()
    {
        dump($this->validate());

        $this->form->store();

    }

    // public function updated($name, $value) 
    // {
    //     dump($name, $value);
    // }
}

// try {
//     $loggedInUser = self::getLoggedInUser();

//     if (!isset($loggedInUser) && empty($loggedInUser)) {
//         throw new Exception("Please login to create an quote.", 401);
//     }

//     /* Curl for get data for create page */
//     $curlData = [];
//     $curlData['headers'] = '';
//     $curlData['body'] = [
//         'store_id' => $loggedInUser['store_id'],
//         'category_id' => env($loggedInUser['store_id'] . "_CATEGORY"),
//         'users_id' => $loggedInUser['id'],
//     ];

//     $url = env('APP_API_URL') . 'apibcquotes/create-quote';
//     $response = $curl->get($url, $curlData);
//     $request = "Modules\BCQuotes\app\Http\Requests\CreateQuotes";

//     if (isset($response) && !empty($response) && $response['code'] == 200) {
//         if (!isset($response['response']['quote_model']) && empty($response['response']['quote_model'])) {
//             $response['response']['quote_model']['country'] = 'us';
//             $brand_setting = $response['response']['brand_setting'];
//             if (isset($brand_setting) && !empty($brand_setting)) {
//                 $response['response']['quote_model']['payment_term'] = $brand_setting['payment_terms'];
//                 $response['response']['quote_model']['term_condition'] = $brand_setting['term_condition'];
//             } else {
//                 throw new Exception("Your branding detail are not found. Kindly enter all the details before creating the quote.", 204);
//             }
//         }

//         return view('bcquotes::quote.create', compact('request'))->with($response['response']);
//     } else {
//         throw new Exception("Unable to process request.", 204);
//     }
// } catch (Exception $e) {
//     $log = [
//         'Message' => $e->getMessage() ?: 500,
//         'Line' => $e->getLine(),
//         'File' => $e->getFile(),
//         'Function' => __FUNCTION__,
//     ];
//     Log::channel('quotes')->critical('Exception', $log);
// } catch (Throwable $th) {
//     $log = [
//         'Message' => $th->getMessage() ?: 500,
//         'Line' => $th->getLine(),
//         'File' => $th->getFile(),
//         'Function' => __FUNCTION__,
//     ];
//     Log::channel('quotes')->critical('Throwable', $log);
// }

// return redirect()->back()->with('error', $log['Message']);

