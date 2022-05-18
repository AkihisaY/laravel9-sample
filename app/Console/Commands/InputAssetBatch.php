<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\Api;
use App\Models\Asset;
use App\Models\Expense;

class InputAssetBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:InsertAsset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert Asset Data Batch';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        Log::info("[1]. === Delete Monthly Asset Data Start === ");
        Asset::truncate();
        Log::info("[1]. === Delete Monthly Asset Data End === ");
        Log::info("[2]. === Insert Monthly Asset Data Start === ");
        $api_info = new Api();
        $assets = $api_info->getMonthlyAssets();
        foreach($assets as $asset){
            $date = substr($asset['date'],3,4)."-".substr($asset['date'],0,2)."-01";
            $status = Asset::create([
                'target_date' => $date
                ,'bank_jpy' => $asset['cash_jpy']
                ,'bank_usd' => $asset['cash_usd']
                ,'investigation_jpy' => $asset['cash_inv_jpy']
                ,'investigation_usd' => $asset['cash_inv_usd']
                ,'stock' => $asset['stock_us']
                ,'total' => $asset['total_amount']
            ]);
            Log::debug($asset['date']." : Asset ID ==> ".$status->id);
        }
        Log::info("[2]. === Insert Monthly Asset Data End === ");
        Log::info("[3]. === Delete Expenses Data Start === ");
        Expense::truncate();
        Log::info("[3]. === Delete Expenses Data End === ");
        Log::info("[4]. === Insert Expenses Data Start === ");
        $api_info = new Api();
        $expenses = $api_info->getExpensesList();
        foreach($expenses as $expense){
            $date = substr($expense['pay_date'],6,4)."-".substr($expense['pay_date'],0,2)."-".substr($expense['pay_date'],3,2);
            $status = Expense::create([
                'pay_date' => $date
                ,'pay_amount' => $expense['pay_amount']
                ,'contents' => $expense['contents']
                ,'city' => $expense['city']
                ,'state' => $expense['state']
                ,'country' => $expense['country']
            ]);
            Log::debug($expense['pay_date']." : Expense ID ==> ".$status->id);
        }
        Log::info("[4]. === Insert Expenses Data End === ");

        return 0;
    }
}
