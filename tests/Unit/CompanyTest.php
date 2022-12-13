<?php

namespace Tests\Unit;

use App\Http\Requests\StoreCompany;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;
use Termwind\Components\Hr;

class CompanyTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    // public function sample() {

    //     $company = new Company();
    //     $companyService = new CompanyService($company);
    //     $validate = new StoreCompany();

    //     $request = $this->post('/companies/store', [
    //         "first_name" => 'Khaled', 
    //         'last_name' => 'Ahmed', 
    //         'company' => 'Alex Walker', 
    //         'email' => 'test@test.com',
    //         'Phone' => '01093735450'
    //     ]);

    //     $request = New Request([
    //         "first_name" => 'Khaled', 
    //         'last_name' => 'Ahmed', 
    //         'company' => 'Alex Walker', 
    //         'email' => 'test@test.com',
    //         'Phone' => '01093735450'
    //     ]);

    //     $companyService->store($request, $validate);

    //     $this->assertFalse($companyService->store($request, $validate));
    // }
}
