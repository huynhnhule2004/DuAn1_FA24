<?php

namespace App\Views\Client\Pages\Cart;

use App\Views\BaseView;



class Cart extends BaseView
{
    public static function render($data = null)
    {
?>
    <style>
        @media (max-width: 576px) {
  .table thead {
      display: none;
  }

  .table, .table tbody, .table tr, .table td {
      display: block;
      width: 100%; 
      box-sizing: border-box; 
  }

  .table tr {
      margin-bottom: 15px; 
      border: 1px solid #ddd;
      border-radius: 8px;
      overflow: hidden;
  }

  .table td {
      text-align: left;
      position: relative;
      padding-left: 50%;
      padding-top: 10px;
      padding-bottom: 10px;
      padding-right: 10px;
  }

  .table td::before {
      content: attr(data-label); 
      position: absolute;
      left: 10px; 
      width: 50%; 
      padding-right: 10px;
      white-space: nowrap;
      font-weight: bold;
  }
}
    </style>
        <section class="h-100 h-custom">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="h2">Giỏ Hàng</th>
                                        <th scope="col" class="text-center">Định dạng</th>
                                        <th scope="col" class="text-center">Số lượng</th>
                                        <th scope="col">Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center">
                                                <img src="/public/assets/client/images/22.jpg" class="img-fluid rounded-3" style="width: 120px;" alt="Mimo thức ăn mèo">
                                                <div class="flex-column ms-4">
                                                    <p class="mb-2">Mimo thức ăn mèo</p>
                                                    <p class="mb-0">5kg</p>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle text-center" data-label="Định dạng">
                                            <p class="mb-0" style="font-weight: 500;">Túi</p>
                                        </td>
                                        <td class="align-middle text-center" data-label="Số lượng">
                                            <div class="d-flex flex-row align-items-center justify-content-center">
                                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-3"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fas fa-minus fa-lg"></i>
                                                </button>

                                                <input id="quantity1" min="0" name="quantity" value="2" type="number"
                                                    class="form-control form-control-sm mx-2" style="width: 60px; height: 38px;" />

                                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-3"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fas fa-plus fa-lg"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="align-middle" data-label="Giá">
                                            <p class="mb-0" style="font-weight: 500;">$9.99</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="border-bottom-0">
                                            <div class="d-flex align-items-center">
                                                <img src="/public/assets/client/images/123.jpg" class="img-fluid rounded-3" style="width: 120px;" alt="Whiskas thức ăn mèo">
                                                <div class="flex-column ms-4">
                                                    <p class="mb-2">Whiskas thức ăn mèo</p>
                                                    <p class="mb-0">10kg</p>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle border-bottom-0 text-center" data-label="Định dạng">
                                            <p class="mb-0" style="font-weight: 500;">Túi</p>
                                        </td>
                                        <td class="align-middle border-bottom-0 text-center" data-label="Số lượng">
                                            <div class="d-flex flex-row align-items-center justify-content-center">
                                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-3"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fas fa-minus fa-lg"></i>
                                                </button>

                                                <input id="form1" min="0" name="quantity" value="1" type="number"
                                                    class="form-control form-control-sm mx-2" style="width: 60px; height: 38px;" />

                                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-3"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fas fa-plus fa-lg"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="align-middle border-bottom-0" data-label="Giá">
                                            <p class="mb-0" style="font-weight: 500;">$13.50</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-lg-4 col-xl-3 ms-auto">
                                        <div class="d-flex justify-content-between" style="font-weight: 500;">
                                            <p class="mb-2">Tổng cộng</p>
                                            <p class="mb-2">$23.49</p>
                                        </div>

                                        <div class="d-flex justify-content-between" style="font-weight: 500;">
                                            <p class="mb-0">Vận Chuyển</p>
                                            <p class="mb-0">$2.99</p>
                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                                            <p class="mb-2">Tổng cộng</p>
                                            <p class="mb-2">$26.48</p>
                                        </div>

                                        <div class="d-flex justify-content-center">
											<button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">
												<span>Thanh Toán</span>
											</button>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>



<?php
    }
}
