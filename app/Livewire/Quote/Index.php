<?php

namespace App\Livewire\Quote;

use App\Services\CurlService;
use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;
use App\Livewire\Brand\Index as BrandIndex;



class Index extends Component
{
    use WithPagination;

    public $bcCustomerId = 2;
    public $brand;

    public function boot(CurlService $curl)
    {
        if ($this->brand !== true) {
            $curlData = [];
            $curlData['headers'] = '';
            $curlData['body'] = [
                'user_id' => $this->bcCustomerId,
                'store_id' => $this->bcCustomerId,
            ];
            $url = env('APP_API_URL') . 'apibcquotes/view-business-setting';
            $response = $curl->get($url, $curlData);

            if (!(isset($response['response']['id']) && !empty($response['response']['id']))) {
                $this->redirect(BrandIndex::class, navigate: true);
            } else {
                $this->brand = true;
            }
        }
    }

    public function render(CurlService $curl)
    {

        $curlData = [];
        $curlData['headers'] = '';
        $curlData['body'] = [
            'user_id' => $this->bcCustomerId,
            'store_id' => $this->bcCustomerId,
        ];
        $url = env('APP_API_URL') . 'apiquotelivewire/get-quote-table/' . $this->bcCustomerId;
        $response = $curl->get($url, $curlData);

        $quotes = new LengthAwarePaginator($response['data'], $response['total'], $response['per_page'], 1, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        // dd($quotes);

        return view('livewire.quote.index',[
            'quotes' => $quotes
        ]);
    }
}

