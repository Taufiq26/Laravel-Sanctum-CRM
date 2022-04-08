<?php

namespace Database\Seeders;

use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class OnlineRetailTransaction2009to2010 extends SpreadsheetSeeder
{    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DATASETS DOCUMENTATION : https://www.kaggle.com/code/nihandincer/customer-relationship-management-crm/data
        // specify relative to Laravel project base path
        // specify filename that is automatically dumped from an external process
        $this->file = '/database/seeders/online_retail_II.xlsx';  // note: could alternatively be a csv
        
        // specify the table this is loaded into
        $this->tablename = 'online_retail_transactions';

        // field aliases
        $this->aliases = [
            'Invoice' => 'inv_code',
            'StockCode' => 'stock_code',
            'Description' => 'description',
            'Quantity' => 'qty',
            'InvoiceDate' => 'inv_date',
            'Price' => 'price',
            'Customer ID' => 'customer_id',
            'Country' => 'country'
        ];
        
        // in this example, table truncation also needs to be disabled so previous sales records are not deleted
        $this->truncate = false;
        
        parent::run();
    }
}