<?php

namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentExport  implements FromCollection,WithHeadings
{
	public $payments;
	public function __construct($payments)
	{
		$this->payments = $payments;
	}
	/*public function collection()
    {
        return $this->payments;
    }*/
    public function collection()
    {
    	$payments=$this->payments;
    	$collection=[];
    	foreach($payments as $payment){
    		array_push($collection,[
    			'id'=>$payment->id,
    			'user_id'=>$payment->user_id,
    			'user'=>$payment->user->name,
    			'order_id'=>$payment->order_id,
    			'type'=>$payment->type,
    			'status'=>$payment->status,
    			'amount'=>$payment->amount,	
    		]);
    	}
    	return collect($collection);

    	
        /*return [
            $payment->id,
            $payment->user_id,
        ];*/
    }
    public function headings(): array
    {
        return [
            '#',
            'user_id',
            'user',
            'order_id',
            'type',
            'status',
            'amount'
        ];
    }
}
