<?php

namespace App\Views\Client\Pages\Wishlist;

use App\Views\BaseView;



class Wishlist extends BaseView
{
	public static function render($data = null)
	{
?>
		<section class="h-100 h-custom">
			<div class="container h-100 py-5">
				<div class="row d-flex justify-content-center align-items-center h-100">
					<div class="col">

						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col" class="h2">Mục Yêu Thích</th>
										<th scope="col" class="text-center">Định dạng</th>
										<th scope="col" class="text-center">Số lượng</th>
										<th scope="col" class="text-center">Giá</th>
										<th scope="col" class="text-center">Thao tác</th>
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
											<p class="mb-0">2</p>
										</td>
										<td class="align-middle text-center" data-label="Giá">
											<p class="mb-0" style="font-weight: 500;">$9.99</p>
										</td>
										<td class="align-middle text-center" data-label="Thao tác">
											<button class="btn btn" onclick="removeItem(this)">Xóa</button>
											<button class="btn btn" onclick="moveToCart(this)">Thêm vào Giỏ</button>
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
											<p class="mb-0">1</p>
										</td>
										<td class="align-middle border-bottom-0 text-center" data-label="Giá">
											<p class="mb-0" style="font-weight: 500;">$13.50</p>
										</td>
										<td class="align-middle border-bottom-0 text-center" data-label="Thao tác">
											<button class="btn btn-susses" onclick="removeItem(this)">Xóa</button>
											<button class="btn btn" onclick="moveToCart(this)">Thêm vào Giỏ</button>
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
										<br>
										<!-- Thay đổi đây -->
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
