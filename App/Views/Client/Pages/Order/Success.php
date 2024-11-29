<?php

namespace App\Views\Client\Pages\Order;

use App\Views\BaseView;

class Success extends BaseView
{
    public static function render($data = null)
    {

?>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #f3f4f7, #eef2f3);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        max-width: 700px;
        width: 100%;
        padding: 20px;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        background: #fff;
    }

    .card-header {
        background: #28a745;
        color: #fff;
        text-align: center;
        padding: 20px;
    }

    .card-header h2 {
        margin: 0;
        font-size: 1.8rem;
    }

    .card-body {
        padding: 30px 20px;
        line-height: 1.8;
        font-size: 1rem;
        color: #333;
    }

    .card-body p {
        margin: 0 0 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #e9ecef;
        padding-bottom: 8px;
    }

    .card-body p strong {
        color: #000;
        font-weight: 600;
    }

    .card-body p span {
        color: #555;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .card-body p {
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        .card-body p strong,
        .card-body p span {
            display: block;
            margin-bottom: 5px;
        }
    }

    /* Animation */
    .card {
        animation: fadeInUp 0.5s ease-in-out;
    }

    @keyframes fadeInUp {
        from {
            transform: translateY(30px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    a {
    text-decoration: none; /* Loại bỏ gạch chân */
    color: #007bff; /* Màu xanh tiêu chuẩn */
    font-weight: 500; /* Đậm nhẹ */
    transition: color 0.3s ease-in-out; /* Hiệu ứng chuyển đổi màu mượt */
}
</style>


        <section class="h-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h2>Thanh toán thành công!</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>Số tiền:</strong> <?= number_format($data['vnp_Amount'] / 100, 0, ',', '.') ?> VNĐ</p>
                        <p><strong>Ngân hàng:</strong> <?= htmlspecialchars($data['vnp_BankCode']) ?></p>
                        <p><strong>Loại thẻ:</strong> <?= htmlspecialchars($data['vnp_CardType']) ?></p>
                        <p><strong>Mã giao dịch ngân hàng:</strong> <?= htmlspecialchars($data['vnp_BankTranNo']) ?></p>
                        <p><strong>Mã giao dịch VNPAY:</strong> <?= htmlspecialchars($data['vnp_TransactionNo']) ?></p>
                        <p><strong>Thời gian thanh toán:</strong> <?= htmlspecialchars($data['vnp_PayDate']) ?></p>
                        <p><strong>Thông tin đơn hàng:</strong> <?= htmlspecialchars($data['vnp_OrderInfo']) ?></p>
                        <p><strong>Mã tham chiếu:</strong> <?= htmlspecialchars($data['vnp_TxnRef']) ?></p>
                        <a href="/orders/<?= $data['vnp_TxnRef']; ?>" class="btn btn-primary">Xem chi tiết đơn hàng</a> 
                    </div>
                </div>
            </div>
        </section>
<?php
    }
}
